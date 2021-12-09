/**   
 * @typedef Routes array of objects
 * @type {Array<{title: string, path: string, component: HTMLElement}>}
 * @property {string} title - a name for the path.
 * @property {string} path - relative path to the route.
 * @property {HTMLElement} component - the component to render. 

 * @typedef Route object of route
 * @type {Object}
 * @property {string} title - a name for the path.
 * @property {string} path - relative path to the route.
 * @property {HTMLElement} component - the component to render. 
 **/

class Navigate  {

    #routes
    #links
    
    /** Initializes the page as a Single Page Application
     * @param {Routes} routes - routes array to define pages of the SPA
     * @param {() => void} cb - callback function after initializing the SPA
     * 
    **/
    constructor(routes, spaCallback, cb) {

        this.#links = this.#getAnchors();
        this.useSPA(spaCallback);
        this.#routes = routes
        this.query = {}
            
        this.currentRoute = window.location.pathname;
        this.manageViews()
        

        cb?.()
    }

    #getAnchors() {
        return Array.from(document.getElementsByTagName('a'))
    }

    /** Changes the defualt behavoir of the links to use the SPA 
    * @param {() => void} cb - callback function
    * @return {void}
    **/
    useSPA(cb) {
        this.getLinks.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                if (cb) {
                    cb(item.getAttribute('href'));
                } else {
                    this.navigateTo(item.getAttribute('href'));
                }
            })
        })

        // lisen for popstate changes and call the navigateTo function
        window.addEventListener('popstate', (e) => {
            e.preventDefault()
            this.navigateTo(window.location.pathname);
        })
    }

    /**  Gets all hrefs from anchor tags in the document and creates a route object for each
    * @param {HTMLAnchorElement[] } links - Array of HTMLAnchorElement
    * @param {() => void } cb - *Optional* callback function
    * @example - this.fetchRoutes(this.#links, callback);
    * @return {Array} {path: string, title: string} - Array of objects with the path and the title
    **/
    fetchRoutes(links, cb) {
        return this.#routes = links.map(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                if (cb) {
                    cb(link.getAttribute('href'));
                } else {
                    this.navigateTo(link.getAttribute('href'));
                }
            })

            return {
                path: link.getAttribute('href'),
                title: link.innerText
            }
        })
    }

    /** Uses the history object to navigate to a new route and prevents browser from reloading
    * @param {(path: string)} - An array of HTMLAnchorElement
    * @example - this.navigateTo('/first');
    * @return {void}
    */
    navigateTo(path) {
        const pathUrl = new URL(path, window.location.origin);

        let route = this.getRoutes.find(route => route.path === pathUrl.pathname);
        if (route) {
            window.history.pushState("", document.title, location.origin + route.path + pathUrl.search);
            const quarySearchArray = pathUrl.search.split(/\?|=/)

            // Creating custom event for page change
            // Adding the route and id to the custom event
            const event = new CustomEvent('page-change', { detail: {
                route,
                id: quarySearchArray ? Number(quarySearchArray[2]) : null
            } });
            document.dispatchEvent(event); // Dispaches the event, so that it fires the callback function
            document.title = route.title;
        } else {
            const route = this.getRoutes.find(route => route.title === 'fallback');
            console.log('location.origin + route.path + pathUrl.search: ', location.origin + route.path + pathUrl.search);
            window.history.pushState("", document.title, location.origin + route.path + pathUrl.search);
            document.title = route.title;
        }

        this.currentView = window.location.pathname
        // console.log('window.location.pathname: ', window.location.pathname);
        this.manageViews()
        
    }

    /**  Gets all hrefs from anchor tags in the document
    * @return {() => void } - getLinks
    */
    get getLinks() {
        return this.#links;
    }

    /** Gets all created routes in the SPA object
    * @return {Array<Route>} - getRoutes
    */
    get getRoutes() {
        return this.#routes;
    }

    /** Sets the current view
     * @param {(currentUrlPath: string) => void} currentView - sets the current view
     */
    set currentView(currentView) {
        this.currentRoute = currentView;
    }

    /**  Manges what views to be shown
    * @returns {string} currentView
    **/
    manageViews() {
        const views = this.#routes


        let currentView
        views.forEach((curr) => {
            if (curr.path === this.currentRoute || curr.title === this.currentRoute) {
                curr.component.style.display = 'block';
                currentView = curr.component;
            } else {
                curr.component.style.display = 'none';
            }
        }, null);
        
        console.log('currentView: ', currentView);
        return currentView
    }



}

export default Navigate;