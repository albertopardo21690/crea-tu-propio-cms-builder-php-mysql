<div class="container-fluid">
    <div class="d-flex flex-wrap justify-content-center align-content-center vh-100">
        <div class="card border-0 rounded shadow p-5">
            <form method="post" class="needs-validation" novalidate>
                <h3 class="pt-3 text-center">Instalacion del Dashboard</h3>

                <hr>

                <div class="form-group mb-3">
                    <label class="mb-2" for="email_admin">Correo Administrador <sup>*</sup></label>
                    <input type="email" class="form-control rounded" id="email_admin" name="email_admin" required>

                    <div class="valid-feedback">Válido</div>
                    <div class="invalid-feedback">Este campo es requerido. Completalo antes de continuar.</div>
                </div>

                <div class="form-group mb-3">
                    <label class="mb-2" for="password_admin">Contraseña Administrador <sup>*</sup></label>
                    <input type="password" class="form-control rounded" id="password_admin" name="password_admin"
                        required>

                    <div class="valid-feedback">Válido</div>
                    <div class="invalid-feedback">Este campo es requerido. Completalo antes de continuar.</div>
                </div>

                <div class="form-group mb-3">
                    <label class="mb-2" for="title_admin">Nombre del Dashboard <sup>*</sup></label>
                    <input type="text" class="form-control rounded" id="title_admin" name="title_admin" required>

                    <div class="valid-feedback">Válido</div>
                    <div class="invalid-feedback">Este campo es requerido. Completalo antes de continuar.</div>
                </div>

                <div class="form-group mb-3">
                    <label class="mb-2" for="symbol_admin">Símbolo del Dashboard <sup>*</sup></label>
                    <input type="text" class="form-control rounded" id="symbol_admin" name="symbol_admin" required>

                    <div class="valid-feedback">Válido</div>
                    <div class="invalid-feedback">Este campo es requerido. Completalo antes de continuar.</div>
                </div>

                <div class="form-group mb-3">
                    <label class="mb-2" for="font_admin">Tipografía del Dashboard</label>
                    <textarea class="form-control rounded" id="font_admin" name="font_admin"></textarea>
                </div>

                <div class="form-group mb-3">
                    <label class="mb-2" for="color_admin">Color del Dashboard</label>
                    <input type="color" class="form-control form-control-color rounded" id="color_admin"
                        name="color_admin" value="#000000" title="Escoge el color">
                </div>

                <div class="form-group mb-3">
                    <label class="mb-2" for="back_admin">Imagen para el login</label>
                    <input type="text" class="form-control rounded" id="back_admin" name="back_admin">
                </div>

                <small><sup>*</sup> Campos obligatorios</small>

                <button type="submit" class="btn btn-dark btn-block w-100 rounded mt-5">Instalar</button>
            </form>
        </div>
    </div>
</div>