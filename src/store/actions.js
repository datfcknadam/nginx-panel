import axios from 'axios';
export default {
  loadHostList({commit}){
    axios
      .get('http://localhost:3030/')
      .then((response) => {
        commit("SET_HOST_LIST", response);
      // eslint-disable-next-line no-console
      }).catch(error => console.log(error.response));
  },
}
