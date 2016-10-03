<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                        <button @click="fire" type="button" class="btn btn-default">button</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        ready() {
            console.log('Component ready.')
        },

        methods: {
            fire() {
              this.$http.post(base_url + 'home/temp/')
              .then(response => {
                console.log(response.data);
            });

            }
        }
    }
</script>
