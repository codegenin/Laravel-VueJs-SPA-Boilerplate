import axios from "axios";
import { setHttpToken } from "../../../helpers";

export const register = ({ dispatch }, { payload, context }) => {
    return axios
        .post("/api/register", payload)
        .then(response => {
            dispatch("setToken", response.data.meta.token).then(() => {
                dispatch("fetchUser");
            });
        })
        .catch(error => {
            context.errors = error.response.data.errors;
        });
};

export const login = ({ dispatch }, { payload, context }) => {
    return axios
        .post("/api/login", payload)
        .then(response => {
            dispatch("setToken", response.data.meta.token).then(() => {
                dispatch("fetchUser");
            });
        })
        .catch(error => {
            context.errors = error.response.data.errors;
        });
};

export const fetchUser = ({ commit }) => {
    return axios.get("/api/me").then(response => {
        commit("setAuthenticated", true);
        commit("setUserData", response.data.data);
    });
};

export const setToken = ({ commit, dispatch }, token) => {
    commit("setToken", token);
    setHttpToken(token);
};
