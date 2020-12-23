<template>
    <div class="container">
        <h3 class="text-center my-4 h1">Messaging</h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Channel</h4>
                        </div>
                        <!-- <div class="srch_bar">
                            <div class="stylish-input-group">
                                <input type="text" class="search-bar"  placeholder="Search" >
                                <span class="input-group-addon">
                                    <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                </span>
                            </div>
                        </div> -->
                    </div>
                    <div class="inbox_chat">
                        <div :class="'chat_list noselect ' + (getChannel() == 'general' ? 'active_chat': '')" @click="setChannel('general')">
                            <div class="chat_people">
                                <div class="chat_img">
                                    <div class="fa fa-globe fa-3x"></div>
                                </div>
                                <div class="chat_ib">
                                    <h5 class="noselect">General</h5>
                                    <p class="no-select">This is general room for chatting</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mesgs">
                    <div class="m-aut text-center" v-if="getChannel() == null">
                        <h2 class="h2" style="margin-top: 7em">Select Channel First !</h2>
                    </div>
                    <div v-else>
                        <div class="msg_history">
                            <div v-for="chat in message" :key="chat.id">
                                <div class="outgoing_msg" v-if="chat.username == getName()">
                                    <div class="sent_msg">
                                        <p>{{ chat.message }}</p>
                                        <span class="time_date">{{ moment(chat.created_at).calendar() }}</span>
                                    </div>
                                </div>
                                <div class="incoming_msg" v-else>
                                    <div class="incoming_msg_img">
                                        <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                    </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>
                                                <strong class="mb-1 d-block">{{ chat.username }}</strong>
                                                {{ chat.message }}
                                            </p>
                                            <span class="time_date">{{ moment(chat.created_at).calendar() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="type_msg">
                            <div class="input_msg_write">
                                <input type="text" class="write_msg" placeholder="Type a message" v-model="chat" />
                                <button class="msg_send_btn" type="button" @click="send()">
                                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center top_spac">Design by <a target="_blank" href="https://bootsnipp.com/sunil8107">Sunil Rajput</a>, Created By <a href="https://facebook.com/vermaysha">Ashary Vermaysha</a>, Source Code <a href="https://github.com/vermaysha/chat">Github</a> </p>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-focus="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Hello New User !</h5>
                </div>
                <div class="modal-body">
                    Please give me your name please !
                    <div class="py-3">
                        <input type="text" class="form-control" v-model="name" placeholder="Type your name here">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="ok">Okey</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                ws: null,
                name: null,
                channel: null,
                message: [],
                chat: null,
            }
        },
        methods: {
            ok() {
                if (this.name.length > 0) {
                    localStorage.setItem('name', this.name)
                    $('#myModal').modal('hide')
                }
            },
            getChannel() {
                return this.channel
            },
            setChannel(channel) {
                if (this.channel == channel) {
                    this.channel = null
                } else {
                    this.channel = channel
                    this.getMessage();
                    this.init()
                }
            },
            getMessage() {
                this.$http.get(CHAT_HISTORY_URL)
                .then(function(res) {
                    this.message = res.data
                }.bind(this))
            },
            getName() {
                return this.name
            },
            send() {
                if (this.chat == null) {
                    alert('Please type message !')
                    return
                }
                let chat = {
                    username: this.getName(),
                    message: this.chat
                }
                this.message.push(chat)
                this.ws.send(JSON.stringify(chat))
                this.chat = null
            },
            init() {
                if (this.ws == null) {
                    this.ws = new WebSocket(WEBSOCKET_URL)
                }
                this.ws.onopen = e => {
                    console.log('[open] Connection established')
                }
                this.ws.onerror = err => {
                    console.error(`[error] ${err.message}`)
                }
                this.ws.onclose = e => {
                    if (e.wasClean) {
                        console.log(`[close] Connection closed cleanly, code=${e.code} reason=${e.reason}`)
                    } else {
                        console.log('[close] Connection died')
                    }
                }
                this.ws.onmessage = e => {
                    let data = JSON.parse(e.data)

                    this.message.push(data)
                }
            },
        },
        computed: {
        },
        mounted() {
            if ( ! localStorage.getItem('name')) {
                $('#myModal').modal('show')
            } else {
                this.name = localStorage.getItem('name')
            }
        }
    }
</script>
