require('select2');

class identify {
    constructor () {
        this.userIds = [];
        this.setupEvents();
    }

    setupEvents () {
        $().ready(() => {
            for (let id of this.userIds) {
                $('article[userId='+id+'] .read-more-btn').click(() => {
                    $('#identifyModal').modal()
                });
            }
            $("select").select2();
        });
    }

    addUser (id) {
        this.userIds.push(id);
    }
}

module.exports = identify;
