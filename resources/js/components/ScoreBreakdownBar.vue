<template>
    <div class="row justify-content-start">
        <span style="text-align: left; font-family: Copperplate; font-size:14px ;">{{title}}</span>
        <progress-bar
            :options="options"
            :value=value
            />
    </div>
</template>

<script>
    export default {
        props: {
            title: String,
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
                        fontSize: 12,
                        fontFamily: 'Copperplate',
                        dynamicPosition: false,
                        hideText: false,
                    },
                    progress: {
                        color: this.color,
                        backgroundColor: '#e6e6e6',
                        inverted: false
                    },
                    layout: {
                        height: 15,
                        width: 300,
                        zeroOffset: 0,
                        strokeWidth: 30,
                        horizontalTextAlign: 90,
                        verticalTextAlign: 75,
                        progressPadding: 0,
                        type: 'line'
                    }

                }
            }
        }
    }
</script>
