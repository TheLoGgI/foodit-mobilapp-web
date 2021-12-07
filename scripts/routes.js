const Home = document.getElementById("login");
const Register = document.getElementById("register");
const Dashboard = document.getElementById("dashboard");
const Recipes = document.getElementById("recipes");

const routes = [
  {
    path: "/",
    title: "home",
    component: Home,
  },
  {
    path: "/register",
    title: "register",
    component: Register,
  },
  {
    path: "/dashboard",
    title: "dashboard",
    component: Dashboard,
  },

  {
    path: "/recipes",
    title: "recipes",
    component: Recipes,
  },
];

export default routes;
