<template>
<div>
    <span class="badge badge-danger" v-for="notification in notifications">
        *
    </span>
</div>
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
            axios.get('/api/notifications/count')
                .then(response => {
                    this.notifications = response.data;

                    Echo.join(`App.User.${this.user}`)
                        .notification(notification => {
                            this.notifications.push(notification)
                        })
                });
        }

    }
</script>