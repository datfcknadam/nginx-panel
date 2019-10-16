export default {
  SET_LIST_ITEM (state, key ) {
    state.listItem = key;
  },
  SET_HOST_LIST(state, value) {
    state.hostList = value;
    console.log(value);
  }
};
