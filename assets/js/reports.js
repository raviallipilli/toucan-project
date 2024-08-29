document.getElementById('check-all').addEventListener('change', function() {
    var checkboxes = document.querySelectorAll('.school-checkbox');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
});