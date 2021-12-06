const Home = document.getElementById('login')
const Register = document.getElementById('register')
const Onboarding = document.getElementById('onboarding')



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
    {
        path: '/onboarding',
        title: 'onboarding',
        component: Onboarding,
    },
]

export default routes