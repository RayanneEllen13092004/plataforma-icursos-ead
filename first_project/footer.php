</div>

<footer>
    <div class="container footer-center">
        © 2026 - iCursos
    </div>
</footer>

<script src="js/jquery.js"></script>
<script src="//cdn.datatables.net/2.3.6/js/dataTables.min.js"></script>

<script>
$(document).ready(function () {

    if ($('#cursos').length) {
        $('#cursos').DataTable({
            language: {
                url: "js/datatables/pt-BR.json"
            }
        });
    }

    if ($('#alunos').length) {
        $('#alunos').DataTable({
            language: {
                url: "js/datatables/pt-BR.json"
            },
            columnDefs: [
                {
                    targets: 1,
                    className: "dt-left"
                }
            ]
        });
    }

    if ($('#matriculas').length) {
        $('#matriculas').DataTable({
            language: {
                url: "js/datatables/pt-BR.json"
            }
        });
    }

});
</script>
