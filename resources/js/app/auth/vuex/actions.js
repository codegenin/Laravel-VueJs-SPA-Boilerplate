import axios from "axios";

export const register = ({ dispatch }, { payload }) => {
    return axios.post("/api/register", payload).then(response => {
        return console.log(response);
    });
};
