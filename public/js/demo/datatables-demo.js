// Call the dataTables jQuery plugin
// $(document).ready(function () {
//     $("#dataTable").DataTable();
// });

$(document).ready(function () {
    var t = $("#postDataTable").DataTable({
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: [0],
            },
        ],
        order: [[3, "asc"]],
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
    var t = $("#userRoleDataTable").DataTable({
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

$(document).ready(function () {
    var t = $("#roleDataTable").DataTable({
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: [0, -1],
            },
        ],
        order: [[1, "asc"]],
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
    var t = $("#permissionOfRoleDataTable").DataTable({
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: [0, -1, -2],
            },
        ],
        order: [[1, "asc"]],
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
    var t = $("#permissionDataTable").DataTable({
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: [0, -1],
            },
        ],
        order: [[1, "asc"]],
    });

    t.on("order.dt search.dt", function () {
        t.column(0, { search: "applied", order: "applied" })
            .nodes()
            .each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
    }).draw();
});
