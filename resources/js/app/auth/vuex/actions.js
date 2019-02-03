import axios from "axios";

export const register = ({ dispatch }, { payload, context }) => {
    return axios
        .post("/api/register", payload)
        .then(response => {
            return console.log(response);
        })
        .catch(error => {
            context.errors = error.response.data.errors;
        });
};
