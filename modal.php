<!-- for adding agent -->
<!-- Modal -->
<div class="modal fade" id="addAgent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create an Agent Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-around">
                    <div class="col">
                        <ul id="msg_error_create_agent" class='text-center error_list'></ul>
                        <form>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Email</label>
                                <input type="email" class="form-control" id="create_agent_email"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="create_agent_username"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="create_agent_phone"
                                    placeholder='0788995882'>
                            </div>
                            <div class="mb-3">
                                <label for="login_password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="create_agent_password">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id='create_agent_btn' class="btn btn-primary">Create Agent</button>
            </div>
        </div>
    </div>
</div>
<!--  -->


<!-- for adding Business -->
<!-- Modal -->
<div class="modal fade" id="addBusiness" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create a Business Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-around">
                    <div class="col">
                        <ul id="msg_error_create_business" class='text-center error_list'></ul>
                        <form>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Email</label>
                                <input type="email" class="form-control" id="create_business_email"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="create_business_username"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="create_business_phone"
                                    placeholder='0788995882'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id='create_business_btn' class="btn btn-primary">Create Business</button>
            </div>
        </div>
    </div>
</div>
<!--  -->