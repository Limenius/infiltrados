require('select2');

class identify {
    constructor (url) {
        this.statusIds = [];
        this.setupEvents();
        this.inModal = null;
        this.url = url;
    }

    setupEvents () {
        $().ready(() => {
            for (let id of this.statusIds) {
                $('article[statusId='+id+'] .read-more-btn').click((evt) => {
                    this.inModal = $(evt.target).parents('article').attr('statusId');
                    $('#identifyModal').modal()
                });
            }
            $("select").select2();
            $("#doIdentify").click(() => {
                const selected = $('#identiselect').val();
                const inModal = this.inModal;
                console.log(`en modal de ${inModal}. Seleccionado ${selected}.`);
                console.log(`${this.url}?statusId=${inModal}&token=${selected}`)
                //$.get(`${this.url}?statusId=${inModal}&token=${selected}`,

                $.get(this.url,
                    {statusId: inModal, token: selected},
                    (data) => {
                        console.log(data);
                    }
                );
            });

        });
    }

    addUser (id) {
        this.statusIds.push(id);
    }
}

module.exports = identify;
