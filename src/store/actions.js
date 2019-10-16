import axios from 'axios';
export default {
  loadHostList({commit}){
    axios
      .get('http://localhost:8888/')
      .then((response) => {
        commit("SET_HOST_LIST", response.data);
      // eslint-disable-next-line no-console
      }).catch(error => console.log(error.response));
  },
}
