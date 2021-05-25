// Call the dataTables jQuery plugin
// $(document).ready(function () {
//     $("#dataTable").DataTable();
// });

$(document).ready(function () {
    var t = $("#dataTable").DataTable({
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: [0],
            },
        ],
        order: [[0, "asc"]],
    });

    t.on("order.dt search.dt", function () {
        t.column(0, { search: "applied", order: "applied" })
            .nodes()
            .each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
    }).draw();
});

$(document).ready(function () {
    var t = $("#userDataTable").DataTable({
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: [0, 1, -1],
            },
        ],
        order: [[2, "asc"]],
    });

    t.on("order.dt search.dt", function () {
        t.column(0, { search: "applied", order: "applied" })
            .nodes()
            .each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
    }).draw();
});

$(document).ready(function () {
    var t = $("#roleDataTable").DataTable({
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: [0, -1, -2],
            },
        ],
        order: [[2, "asc"]],
    });

    t.on("order.dt search.dt", function () {
        t.column(0, { search: "applied", order: "applied" })
            .nodes()
            .each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
    }).draw();
});
