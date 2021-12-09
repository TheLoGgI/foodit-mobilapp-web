const Home = document.getElementById("login");
const Register = document.getElementById("register");
const Onboarding = document.getElementById("onboarding");
const SellProduct = document.getElementById("sellProduct");
const Dashboard = document.getElementById("dashboard");
const Recipes = document.getElementById("recipes");
const Product = document.getElementById("product");

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
    path: "/onboarding",
    title: "onboarding",
    component: Onboarding,
  },
  {
    path: "/sell-product",
    title: "sell-product",
    component: SellProduct,
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
  {
    path: "/product",
    title: "product",
    component: Product,
  },
];

export default routes;
