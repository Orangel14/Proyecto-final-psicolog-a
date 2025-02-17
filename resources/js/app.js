import "./bootstrap";
import "./dashkit/theme";

// Import datatables bootstrap
import DataTable from "datatables.net";
import "datatables.net-bs5";
import "jquery-datatables-checkboxes";
import swal from "sweetalert";

import select2 from "select2";
import toastr from 'toastr';

window.toastr = toastr;

select2();
window.swal = swal;
window.DataTable = DataTable;
