<!-- Main modal -->
<div id="edit-modal-{{$user->id}}" data-modal-show="false" method="dialog" aria-hidden="false"
    class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow relative dark:bg-gray-900 dir1">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                    Add User
                </h3>
                <div class="flex gap-2">
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="edit-modal-{{$user->id}}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div class="flex items-center gap-2 p-2">
                        <button type="reset" onclick="form.reset();"
                            class="text-white p-2 w-full  justify-center text-xl bg-cyan-500 rounded duration-[250ms] hover:shadow-2xl ease-in-out transition-all translate-y-0	 hover:translate-y-[-5px]  flex items-center g-4  "><i
                                class="fas fa-sync-alt"></i></button>
                    </div>
                </div>
            </div>

            <!-- Modal body -->
            <div class="flex flex-col lg:flex-row dir p-2 gap-2">
                <div class="w-full">
                    <div class="w-full flex flex-col lg:w-full">
                        <div class=" rounded-lg p-2">
                            <div>

                                <form action="{{ route('users.update', [ 'id' => $user->id ]) }}" name="form"
                                    method="post" class=" grid grid-cols-4 gap-2">
                                    @csrf
                                    @method('patch')
                                    <span class=" w-full text-white">زنجیرە</span>
                                    <input type="text" name='id' value="{{$user->id}}"
                                        class="col-span-3 outline-none rounded p-1 text-base text-center text-black select-none">
                                    <span class="w-full text-white">ناوی تەواو</span>
                                    <input type="text" value="{{$user->name }}"
                                        class="col-span-3 outline-none rounded p-1 text-base text-center text-black"
                                        name="name" placeholder="ناو" required>
                                    <span class="w-full text-white">بەکارهێنەر</span>
                                    <input type="text" value="{{$user->username }}"
                                        class="col-span-3 outline-none rounded p-1 text-base text-center text-black"
                                        name="username" placeholder="بەکارهێنەر" required>
                                    <span class="w-full text-white">ژ. مۆبایل</span>
                                    <input type="text" value="{{$user->phone }}"
                                        class="col-span-3 outline-none rounded p-1 text-base text-center text-black"
                                        name="phone" placeholder="ژ. مۆبایل" required>
                                    <span class="w-full text-white ">کارایە</span>
                                    <select
                                        class="col-span-3 outline-none rounded p-1 text-base text-center text-black "
                                        name="status" class="form-control @error('status') is-invalid @enderror"
                                        id="status">
                                        <option @selected($user->status == '1') value="1">Active</option>
                                        <option @selected($user->status == '0') value="0">Inactive</option>
                                    </select>
                                    <span class="w-full text-white ">ڕۆڵ</span>
                                    <select
                                        class="col-span-3 outline-none rounded p-1 text-base text-center text-black "
                                        name="role" class="form-control @error('role') is-invalid @enderror" id="role">
                                        <option @selected($user->role->value === 'admin') value="admin">Admin
                                        </option>
                                        <option @selected($user->role->value === 'user') value="user">User
                                        </option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex space-x-2 items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-toggle="cancel-button-{{$user->id}}" type="submit"
                    class="text-white p-1 w-full lg:w-1/4 lg:h-10  justify-center text-xl bg-yellow-500 hover:bg-yellow-600 rounded flex items-center g-4 "><i
                        class="fa-solid fa-angles-left"></i>نوێکردنەوە</button>
            </div>
            </form>
        </div>
    </div>
</div>
