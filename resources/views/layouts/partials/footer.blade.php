<footer class="footer bg-dark text-white py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Inventory<span class="text-primary">Manager</span></h5>
                <p class="small">Sistema de gerenciamento de inventário desenvolvido para facilitar o controle de estoque.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="small mb-0">&copy; {{ date('Y') }} Inventory Manager. Todos os direitos reservados.</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/auth/form-validation.js') }}"></script>
@stack('scripts')