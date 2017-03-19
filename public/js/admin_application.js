$(document).ready(function(){
    $('#content-table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
        },
        "lengthMenu": [[100, 200, 500, 1000], [100, 200, 500, 1000]]
    });
})