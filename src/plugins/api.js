import 'es6-promise/auto'
import axios from "axios"
import qs from 'qs'

const api = axios.create({
  baseURL: '../api/'
})

api.interceptors.request.use(function (config) {
  if (config.method === 'get'){
    config.headers['Content-Type'] = 'application/json';
  } else {
    config.headers['Content-Type'] = 'application/x-www-form-urlencoded';
    config.data = qs.stringify(config.data);
  }
  return config;
}, function (error) {
  return Promise.reject(error)
});

api.interceptors.response.use(function (response) {
    return response;
  }, function (error) {
    if (error.response.status === 401) {
      if (process.env.NODE_ENV === 'production') {
        window.location.href = "/logon/";
      }
    }
    return Promise.reject(error);
  }
);

export default {
  get (route, params) { return api.get(route, params); },
  post (route, params) { return api.post(route, params); },
  put (route, params) { return api.put(route, params); },
  patch (route, params) { return api.patch(route, params); },
  delete (route, params) { return api.delete(route, params); }
}