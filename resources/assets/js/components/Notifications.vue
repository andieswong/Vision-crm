<template>
    <li class="nav-item dropdown ">
    <a href="#" class="nav-link dropdown-toggle" style="color: #ffffff" role="button" data-toggle="dropdown">Notificaciones <span class="badge badge-danger" v-for="notifications in notifications">*</span></a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <a class="dropdown-item" href="/Notifications" v-for="notification in notifications">
            Tienes una notificacion.
        </a>
    </div>
    </li>
</template>

<script>
    export default  {
        props: ['user'],

        data() {
            return{
                notifications: []
            }
        },
        mounted() {
            axios.get('/api/notifications')
                .then(response => {
                    this.notifications = response.data;

                    Echo.private(`App.User.${this.user}`)
                        .notification(notification => {
                            this.notifications.push(notification)
                        })
                });
        }

    }
</script>