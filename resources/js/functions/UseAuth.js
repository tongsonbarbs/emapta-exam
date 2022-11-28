import { reactive, ref } from 'vue';

export function useAuth() {
    const errorMessage = ref('')
    const authUser = ref({})
    const loginForm = reactive({
        email: "",
        password: "",
    });
    const signupForm = reactive({
        firstName: "",
        lastName: "",
        contact: "",
        email: "",
        password: "",
        confirmPassword: "",
    });

    async function getAuth() {
        try {
            let { data: user } = await axios.get('/api/user')
            authUser.value = user;
        }
        catch (ex) {
            errorMessage.value = ex.response.data.message;
        }
    }

    async function login() {
        try {
            await axios.get("/sanctum/csrf-cookie");
            await axios.post("/login", loginForm);

            router.push({ name: "Dashboard" });
        }
        catch (ex) {
            errorMessage.value = ex.response.data.message;
        }
    }

    async function signup() {
        try {
            await axios.get("/sanctum/csrf-cookie");
            await axios.post("/register", {
                first_name: signupForm.firstName,
                last_name: signupForm.lastName,
                contact_no: signupForm.contact,
                email: signupForm.email,
                password: signupForm.password,
                password_confirmation: signupForm.confirmPassword,
            });

            loginForm.email = signupForm.email;
            loginForm.password = signupForm.password;

            await login();

            router.push({ name: "Dashboard" });
        }
        catch (ex) {
            errorMessage.value = ex.response.data.message;
        }
    }

    async function logout() {
        try {
            await axios.post("/logout");

            router.push({ name: "Login" });
        }
        catch (ex) {
            errorMessage.value = ex.response.data.message;
        }
    }

    return {
        errorMessage,
        authUser,
        loginForm,
        signupForm,
        getAuth,
        signup,
        login,
        logout,
    };
}