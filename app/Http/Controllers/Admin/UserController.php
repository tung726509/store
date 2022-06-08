<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Support\Arr;
use App\Rules\VietnamesePhone;
use App\Rules\PasswordCorrect;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

use App\User;
use App\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->_m = new User();
        $this->role_m = new Role();
    }

    public function index()
    {
        $per_page = request()->query('per', 10);
        $search = request()->query('s', '');
        $param = [];

        $query = $this->_m->with([]);

        if ($search != null && $search != "") {
            $param['code'] = $search;
        }

        $query = $query->filter($param);
        $users = $query->orderBy('created_at', 'asc')->paginate($per_page);

        // test
        $users1 = User::all();
        $message = [
            'type' => 'Create task',
            'task' => 'tạo test',
            'content' => 'has been created!',
        ];
        $user = Auth::user();
        // dd(Carbon::now());
        // cách 1 : gọi qua 1 cái job và đây là các đi kèm release() , delay() , attempts() viết sau dispatch
        SendEmail::dispatch($message, $users1)->delay(Carbon::now()->addMinutes(2));
        // cách 2 gọi trực tiếp 1 cái mail
        // Mail::to($user->email)->send(new MailNotify($message));
        // end test

        return view('admin.user.index', compact('per_page', 'search', 'users'));
    }

    public function getAdd()
    {
        $roles = $this->role_m->get();

        return view('admin.user.add', compact('roles'));
    }

    public function add(Request $request)
    {
        $req = $request->all();

        $rules = [
            'username' => ['required', 'string', 'unique:users,username'],
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'unique:users,email'],
            'role' => ['required', 'exists:roles,name'],
            'current_password' => [new PasswordCorrect],
            'password' => ['required', 'string', 'min:6', 'max:255', 'confirmed'],
            'fb' => ['nullable', 'url', 'max:255'],
            'ins' => ['nullable', 'url', 'max:255'],
            'skype' => ['nullable', 'url', 'max:255'],
        ];

        $messages = [
            'username.required' => 'Vui lòng nhập tên đăng nhập !',
            'username.string' => 'Chỉ nhập chuỗi !',
            'username.unique' => 'Tên đăng nhập đã được sử dụng !',
            'name.string' => 'Chỉ nhập chuỗi !',
            'name.max' => 'Tối đa 255 kí tự',
            'email.email' => 'Email không hợp lệ !',
            'email.unique' => 'Email đã được sử dụng !',
            'role.required' => 'Vui lòng chọn quyền hạn cho tài khoản !',
            'role.exists' => 'Quyền hạn không tồn tại !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'password.string' => 'Chỉ nhập chuỗi !',
            'password.min' => 'Tối thiểu 6 kí tự !',
            'password.max' => 'Tối đa 255 kí tự !',
            'password.confirmed' => 'Mật khẩu nhập lại không trùng khớp !',
            'fb.url' => 'Link không hợp lệ !',
            'fb.max' => 'Tối đa 255 kí tự !',
            'ins.url' => 'Link không hợp lệ !',
            'fb.max' => 'Tối đa 255 kí tự !',
            'skype.url' => 'Link không hợp lệ !',
            'skype.max' => 'Tối đa 255 kí tự !',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $data['username'] = $request->input('username');
            $data['name'] = $request->input('name');
            $data['email'] = $request->input('email');
            $data['password'] = bcrypt($request->input('password'));
            $social_network['fb'] = $request->input('fb');
            $social_network['ins'] = $request->input('ins');
            $social_network['skype'] = $request->input('skype');
            $data['social_network'] = json_encode($social_network);
            $data['lock'] = 1;

            $created = $this->_m->create($data);

            if ($created) {
                // dd($created);
                $created->syncRoles($request->input('role'));

                $url = url()->current();
                return redirect($url)->with(['success' => 'Thêm mới thành công !']);
            } else {
                return back()->withInput()->with('fail', 'Lỗi hệ thống , vui lòng thử lại sau !');
            }
        }
    }

    public function getEdit($id)
    {
        $user = $this->_m->with([])->find($id);

        if ($user) {
            $role = $user->getRoleNames()->first();
            $role_pretty_name = $user->getRolePrettyNames()->first();
            $social_network = json_decode($user->social_network, true);
            $roles = $this->role_m->get();
            $form_id = null;

            return view('admin.user.edit', compact('user', 'role', 'role_pretty_name', 'roles', 'social_network', 'form_id'));
        } else {
            $messages = 'Không tìm thấy gì cả =((';
            return view('admin.alertpages.404', compact('messages'));
        }
    }

    public function edit(Request $request, $id)
    {
        $req = $request->all();
        $rules = [];
        $messages = [];
        // dd($req);

        if (Arr::has($req, 'accountForm')) {
            $rules = [
                'username' => ['required', 'string', 'unique:users,username,' . $id . ',id'],
                'name' => ['nullable', 'string', 'max:255'],
                'email' => ['nullable', 'email', 'unique:users,email,' . $id . ',id'],
                'role' => ['required', 'exists:roles,name'],
            ];

            $messages = [
                'username.required' => 'Vui lòng nhập tên đăng nhập !',
                'username.string' => 'Chỉ nhập chuỗi !',
                'username.unique' => 'Tên đăng nhập đã được sử dụng !',
                'name.string' => 'Chỉ nhập chuỗi !',
                'name.max' => 'Tối đa 255 kí tự',
                'email.email' => 'Email không hợp lệ !',
                'email.unique' => 'Email đã được sử dụng !',
                'role.required' => 'Vui lòng chọn quyền hạn cho tài khoản !',
                'role.exists' => 'Quyền hạn không tồn tại !',
            ];
        } elseif (Arr::has($req, 'passwordChangeForm')) {
            $rules = [
                'current_password' => [new PasswordCorrect],
                'password' => ['required', 'string', 'min:6', 'max:255', 'confirmed'],
            ];

            $messages = [
                'password.required' => 'Vui lòng nhập mật khẩu !',
                'password.string' => 'Chỉ nhập chuỗi !',
                'password.min' => 'Tối thiểu 6 kí tự !',
                'password.max' => 'Tối đa 255 kí tự !',
                'password.confirmed' => 'Mật khẩu nhập lại không trùng khớp !',
            ];
        } elseif (Arr::has($req, 'contactForm')) {
            $rules = [
                'fb' => ['nullable', 'url', 'max:255'],
                'ins' => ['nullable', 'url', 'max:255'],
                'skype' => ['nullable', 'url', 'max:255'],
            ];

            $messages = [
                'fb.url' => 'Link không hợp lệ !',
                'fb.max' => 'Tối đa 255 kí tự !',
                'ins.url' => 'Link không hợp lệ !',
                'fb.max' => 'Tối đa 255 kí tự !',
                'skype.url' => 'Link không hợp lệ !',
                'skype.max' => 'Tối đa 255 kí tự !',
            ];
        } elseif (Arr::has($req, 'otherForm')) {
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $data = [];
            $form_id = '';
            $user = $this->_m->find($id);
            if (is_null($user)) {
                return back()->withInput()->with('fail', 'User này không tồn tại !');
            }

            if ($request->has('accountForm')) {
                $data['username'] = $request->input('username');
                $data['name'] = $request->input('name');
                $data['email'] = $request->input('email');
                $form_id = 'account';
            } elseif ($request->has('passwordChangeForm')) {
                $data['password'] = bcrypt($request->input('password'));
                $form_id = 'password_change';
            } elseif ($request->has('contactForm')) {
                $social_network['fb'] = $request->input('fb');
                $social_network['ins'] = $request->input('ins');
                $social_network['skype'] = $request->input('skype');
                $data['social_network'] = json_encode($social_network);
                $form_id = 'contact';
            } elseif ($request->has('otherForm')) {
            }

            $updated = $this->_m->where('id', $id)->update($data);

            if ($updated) {
                if ($request->has('accountForm')) {
                    $user->syncRoles($request->input('role'));
                }

                $url = url()->current();
                // dd($form_id);
                return redirect($url)->with(['success' => 'Cập nhật thành công !', 'form_id' => $form_id]);
            } else {
                return back()->withInput()->with('fail', 'Lỗi hệ thống , vui lòng thử lại sau !');
            }
        }
    }

    public function lockUnlock(Request $request)
    {
        if ($request->ajax()) {
            $current_acc = Auth::user()->roles->first()->name;
            if ($current_acc != 'admin') {
                return Response::json(['success' => true, 'message' => 'Tài khoản của bạn không có quyền thực hiện hành động này .']);
            } else {

                $action = $request->action;
                $user_id = $request->user_id;

                if ($action == 'lock' || $action == 'unlock') {
                    $user = $this->_m->find($user_id);
                    if ($user) {
                        $message = '';
                        $lock = null;
                        if ($action == 'lock') {
                            $lock = 0;
                            $message = 'locked';
                        } else {
                            $lock = 1;
                            $message = 'unlocked';
                        }

                        $updated = $this->_m->where('id', $user_id)->update(['lock' => $lock]);

                        if ($updated) {
                            return Response::json(['success' => true, 'message' => $message]);
                        }
                    } else {
                        return Response::json(['success' => true, 'message' => 'Tài khoản không tồn tại .']);
                    }
                }
            }
        }
        return false;
    }
}
