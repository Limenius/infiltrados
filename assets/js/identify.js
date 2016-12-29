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
                $('#idmodalbody .submit-btn').addClass('hidden');
                $('#idmodalbody .loading').removeClass('hidden');
                $.get(this.url,
                    {statusId: inModal, token: selected},
                    (data) => {
                        $('#idmodalbody .loading').addClass('hidden');
                        if (data.identified) {
                            $('#idmodalbody .result-success').removeClass('hidden');
                            $('article[statusId='+this.inModal+'] .js-name').text(data.name);
                        } else {
                            $('#idmodalbody .result-fail').removeClass('hidden');
                        }
                        setTimeout(function() {location.reload()}, 5000);
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
