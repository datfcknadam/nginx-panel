import axios from 'axios';
export default {
  loadHostList({
    commit
  }) {
    axios
      .get('http://localhost:8888/')
      .then((response) => {
        commit("SET_HOST_LIST", response.data);
        // eslint-disable-next-line no-console
      }).catch(error => console.log(error.response));
  },
  createHost(commit, value) {
    axios
      .post('http://localhost:8888/create', JSON.stringify(value))
      .then((response) => {
        commit("SET_STATUS_CREATE", response.data);
      }).catch(error => console.log(error.response));
  },
}