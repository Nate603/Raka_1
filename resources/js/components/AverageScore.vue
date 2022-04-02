<template>
    <div class="row justify-content-start">
        <progress-bar
            :options="options"
            :value=value
            />
    </div>
</template>

<script>
    export default {
        props: {
            value: Number,
            color: String
        },

        data() {
            return {
                options: {
                      text: {
                        color: '#0d0d0d',
                        shadowEnable: false,
                        shadowColor: '#000000',
                        fontSize: 35,
                        fontFamily: 'Copperplate',
                        dynamicPosition: true,
                        hideText: false,
                    },
                    progress: {
                        color: this.color,
                        backgroundColor: '#e6e6e6',
                        inverted: false
                    },
                    layout: {
                        height: 150,
                        width: 150,
                        zeroOffset: 0,
                        strokeWidth: 10,
                        horizontalTextAlign: 45,
                        verticalTextAlign: 85,
                        progressPadding: 0,
                        type: 'circle'
                    }

                }
            }
        }
    }
</script>