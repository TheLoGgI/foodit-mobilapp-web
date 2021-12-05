const Home = document.getElementById('login')
const Register = document.getElementById('register')



const routes = [
    {
        path: '/',
        title: 'home',
        component: Home,
    },
    {
        path: '/register',
        title: 'register',
        component: Register,
    },
]

export default routes