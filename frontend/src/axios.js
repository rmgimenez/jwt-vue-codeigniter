// import axios
import axios from 'axios';

export const http = axios.create({
  baseURL: 'http://localhost:8080/api',
  headers: {
    Authorization: 'JWT_TOKEN',
    'Content-Type': 'application/json',
  },
});
