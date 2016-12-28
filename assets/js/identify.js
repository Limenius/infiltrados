require('select2');

class identify {
    constructor () {
        this.userIds = [];
        this.setupEvents();
        this.inModal = null;
    }

    setupEvents () {
        $().ready(() => {
            for (let id of this.userIds) {
                $('article[userId='+id+'] .read-more-btn').click((evt) => {
                    this.inModal = $(evt.target).parents('article').attr('userId');
                    $('#identifyModal').modal()
                });
            }
            $("select").select2();
            $("#doIdentify").click(() => {
                const selected = $('#identiselect').val();
                const inModal = this.inModal;
                console.log(`en modal de ${inModal}. Seleccionado ${selected}.`);
            });
        });
    }

    addUser (id) {
        this.userIds.push(id);
    }
}

module.exports = identify;
