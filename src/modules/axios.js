import axios from "axios";
const instance = axios.create({
    baseURL: 'https://benny-portfolio.local/wp-json/wp/v2/',
    timeout: 2000,
  });
  export default instance;