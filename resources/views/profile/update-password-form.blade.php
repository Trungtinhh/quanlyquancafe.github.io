<x-jet-form-section submit="updatePassword">
    <x-slot name="form">
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu hiện tại</label>
            <div class="input-group input-group-merge">
                <input type="password" id="current_password" wire:model.defer="state.current_password" name='current_password' class="form-control" placeholder="Nhập mật khẩu">
                <div class="input-group-text" data-password="false">
                    <span class="password-eye"></span>
                </div>

            </div>
            @error('current_password')
            <div class="text-danger" role="alert">
                {{ $message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu mới</label>
            <div class="input-group input-group-merge">
                <input type="password" id="password" name='password' wire:model.defer="state.password" class="form-control" placeholder="Nhập mật khẩu">
                <div class="input-group-text" data-password="false">
                    <span class="password-eye"></span>
                </div>

            </div>
            @error('password')
            <div class="text-danger" role="alert">
                {{ $message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Xác nhận mật khẩu</label>
            <div class="input-group input-group-merge">
                <input type="password" id="password_confirmation" wire:model.defer="state.password_confirmation" name='password_confirmation' class="form-control" placeholder="Nhập lại mật khẩu">
                <div class="input-group-text" data-password="false">
                    <span class="password-eye"></span>
                </div>

            </div>
            @error('password_confirmation')
            <div class="text-danger" role="alert">
                {{ $message}}
            </div>
            @enderror
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <div class="form-group">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <div class="col-xs-12">
                    <br>
                    <button class="btn btn-outline-warning" type="reset"><i class="glyphicon glyphicon-repeat"></i> Hoàn tác</button>
                    <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Đổi</button>
                </div>
            </div>
        </div>
    </x-slot>
</x-jet-form-section>