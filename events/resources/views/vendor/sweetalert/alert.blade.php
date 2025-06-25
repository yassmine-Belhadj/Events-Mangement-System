<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

<script>
    @if (Session::has('alert.delete'))
    document.addEventListener('click', function (event) {
        if (event.target.matches('[data-confirm-delete]')) {
            event.preventDefault();
            Swal.fire({!! Session::pull('alert.delete') !!}).then(function (result) {
                if (result.isConfirmed) {
                    var form = document.createElement('form');
                    form.action = event.target.href;
                    form.method = 'POST';
                    form.innerHTML = `
                    @csrf
                    @method('DELETE')
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    });
    @endif

    @if (Session::has('alert.config'))
    Swal.fire({!! Session::pull('alert.config') !!});
    @endif
</script>

