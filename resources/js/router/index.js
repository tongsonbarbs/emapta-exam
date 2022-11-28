import { createRouter, createWebHistory } from 'vue-router'

import LoginPage from '../pages/LoginPage.vue'
import SignUpPage from '../pages/SignUpPage.vue'
import DashboardPage from '../pages/DashboardPage.vue'
import Dashboard from '../components/Dashboard.vue'
import { useAuth } from '../functions/UseAuth'

const routes = [
    {
        path: '/login',
        name: 'Login',
        component: LoginPage,
    },
    {
        path: '/signup',
        name: 'Signup',
        component: SignUpPage
    },
    {
        path: '',
        name: 'Dashboard',
        component: DashboardPage,
        redirect: '/dashboard',
        meta: {
            needsAuth: true
        },
        children: [
            {
                path: '/dashboard',
                component: Dashboard
            },
        ]
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach(async (to, from, next) => {
    const { getAuth } = useAuth();

    await getAuth()

    try {
        await axios.get('/api/user')

        if (!to.meta.needsAuth) {
            next("/")
        }

        next()
    }
    catch (ex) {
        if (to.meta.needsAuth) {
            next({ name: 'Login' })
        }

        next()
    }
})

export default router;