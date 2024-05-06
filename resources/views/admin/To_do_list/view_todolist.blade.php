@extends('admin.view_css_js')
@section('noi_dung')
    <div id="app">
        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input v-model="searchData" v-on:keyup.enter="search" type="text" class="form-control ps-5 radius-30"
                            placeholder="search"> <span class="position-absolute top-50 product-show translate-middle-y"><i
                                class="fa-solid fa-magnifying-glass" v-on:click="search"></i></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="dropdown-container">
                            <label for="task_priority" class="filter-label-left">Task priority filter</label>
                            <select id="task_priority" v-model="filter.task_priority" class="form-select mt-2 mt-lg-0" v-on:change="index">
                                <option value="1">high</option>
                                <option value="2">medium</option>
                                <option value="3">low</option>
                                <!-- Add your options here -->
                            </select>
                        </div>
                        <div class="dropdown-container">
                            <label for="status" class="filter-label-left">Status filter</label>
                            <select id="status" v-model="filter.status" class="form-select mt-2 mt-lg-0" v-on:change="index">
                                <option value="1">completed</option>
                                <option value="2">pending</option>
                                <option value="3">unresolved</option>
                                <!-- Add your options here -->
                            </select>
                        </div>
                    </div>
                    <div class="ms-auto">
                        <a href="javascript:;" class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal"
                            data-bs-target="#CreateModal">
                            <i class="bx bxs-plus-square"></i>Add To Do List
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">numerical order</th>
                                <th class="text-center">The name of the job </th>
                                <th class="text-center">job description</th>
                                <th class="text-center">Start Date</th>
                                <th class="text-center">End Date</th>
                                <th class="text-center">priority level</th>
                                <th class="text-center">status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, key) in list">
                                <tr>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">@{{ key + 1 }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">@{{ value.task_name }}</td>
                                    <td class="text-center">@{{ value.describe }}</td>
                                    <td class="text-center">@{{ value.start_date }}</td>
                                    <td class="text-center">@{{ value.end_date }}</td>
                                    <td class="text-center">
                                        <template v-if="value.task_priority == 1">
                                            <div button
                                                class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                                <i class='bx bxs-circle me-1'></i>high
                                            </div>
                                        </template>
                                        <template v-if="value.task_priority == 2">
                                            <div button
                                                class="badge rounded-pill text-primary bg-light-primary p-2 text-uppercase px-3">
                                                <i class='bx bxs-circle me-1'></i>medium
                                            </div>
                                        </template>
                                        <template v-if="value.task_priority == 3">
                                            <div button
                                                class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3">
                                                <i class='bx bxs-circle me-1'></i>low
                                            </div>
                                        </template>
                                    </td>
                                    <td class="text-center">
                                        <template v-if="value.status == 1">
                                            <div button
                                                class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                                <i class='bx bxs-circle me-1'></i>completed
                                            </div>
                                        </template>
                                        <template v-if="value.status == 2">
                                            <div button
                                                class="badge rounded-pill text-primary bg-light-primary p-2 text-uppercase px-3">
                                                <i class='bx bxs-circle me-1'></i>pending
                                            </div>
                                        </template>
                                        <template v-if="value.status == 3">
                                            <div button
                                                class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3">
                                                <i class='bx bxs-circle me-1'></i>unresolved
                                            </div>
                                        </template>
                                    </td>
                                    <td class="text-center">
                                        <i class="fa-solid fa-pen-to-square" data-bs-toggle="modal"
                                            data-bs-target="#UpdateModal" v-on:click="getDetail(value.id)"></i>
                                        <i class="fa-solid fa-trash" data-bs-toggle="modal" data-bs-target="#DeleteModal"
                                            v-on:click="getDetail(value.id)"></i>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add To Do List</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1">
                            <label class="form-label">Task name</label>
                            <input v-model="add.task_name" class="form-control" type="text"
                                placeholder="Enter a task name">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Describe</label>
                            <input v-model="add.describe" class="form-control" type="text"
                                placeholder="Enter a describe">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Start Date</label>
                            <input v-model="add.start_date" class="form-control" type="date"
                                placeholder="Enter a describe">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">End Date</label>
                            <input v-model="add.end_date" class="form-control" type="date"
                                placeholder="Enter a describe">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Task priority</label>
                            <select v-model="add.task_priority" class="form-control">
                                <option value="1">high</option>
                                <option value="2">medium</option>
                                <option value="3">low</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Status</label>
                            <select v-model="add.status" class="form-control">
                                <option value="1">completed</option>
                                <option value="2">pending</option>
                                <option value="3">unresolved</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="create" v-on:click="create()" type="button" class="btn btn-primary"
                            data-bs-dismiss="modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Modal -->
        <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">To-do updates</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1">
                            <label class="form-label">Task name</label>
                            <input v-model="updateData.task_name" class="form-control" type="text"
                                placeholder="Enter a task name">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Describe</label>
                            <input v-model="updateData.describe" class="form-control" type="text"
                                placeholder="Enter a describe">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Start Date</label>
                            <input v-model="updateData.start_date" class="form-control" type="data"
                                placeholder="Enter a describe">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">End Date</label>
                            <input v-model="updateData.end_date" class="form-control" type="data"
                                placeholder="Enter a describe">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Task priority</label>
                            <select v-model="updateData.task_priority" class="form-control">
                                <option value="1">high</option>
                                <option value="2">medium</option>
                                <option value="3">low</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Status</label>
                            <select v-model="updateData.status" class="form-control">
                                <option value="1">completed</option>
                                <option value="2">pending</option>
                                <option value="3">unresolved</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button v-on:click="update()" type="button" class="btn btn-primary"
                            data-bs-dismiss="modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal delete --}}
        <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Modal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to delete this job?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button v-on:click="destroy()" type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                list: [],
                add: {
                    'task_name': '',
                    'describe': '',
                    'start_date': '',
                    'end_date': '',
                    'task_priority': 3,
                    'status': 3,
                },
                updateData: {},
                deleleData: {},
                searchData: '',
                filter: {},
            },
            created() {
                this.index();
            },
            methods: {
                index() {
                    const params = {
                        task_priority: this.filter.task_priority,
                        status: this.filter.status
                    };

                    axios
                        .get('/api/todolist/index', {
                            params
                        })
                        .then(response => {
                            this.list = response.data.toDoList;
                        })
                        .catch(error => {
                            console.log(error);
                        });
                },

                create() {
                    axios
                        .post('/api/todolist/create', this.add)
                        .then((response) => {
                            if (response.data.toDoList) {
                                oasttr.success(res.data.message);
                            } else {
                                oasttr.error(res.data.message);
                            }
                            this.index();
                        })
                        .catch((res) => {
                            console.log(error);
                        });
                },

                getDetail(id) {
                    if (!id) {
                        toastr.error(res.data.message, "Có lỗi!")
                        return false
                    };

                    this.update.id = id;
                    axios.get(`/api/todolist/show/${id}`).then((res) => {
                        this.updateData = {
                            ...res.data.toDoList
                        }
                    }).catch((err) => {
                        console.log("🚀 ~ axios.get ~ err:", err)
                    })
                },

                update() {
                    const id = this.update.id; // Lấy id từ đối tượng update
                    console.log(id);
                    // Sử dụng endpoint /update/{id} với id của task
                    axios
                        .put(`/api/todolist/update/${id}`, this.updateData)
                        .then((res) => {
                            if (res.data.toDoList) {
                                toastr.success(res.data.message, "Thành công!");
                            } else {
                                toastr.error(res.data.message, "Có lỗi!");
                            }
                            this.index();
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },

                destroy() {
                    const id = this.update.id; // Lấy id từ đối tượng update
                    console.log(id);
                    // Sử dụng endpoint /update/{id} với id của task
                    axios
                        .delete(`/api/todolist/delete/${id}`, this.deleleData)
                        .then((res) => {
                            if (res.data.toDoList) {
                                toastr.success(res.data.message);
                            } else {
                                toastr.error(res.data.message);
                            }
                            this.index();
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },

                search() {
                    axios
                        .post(`/api/todolist/search`, {
                            valueSearch: this.searchData
                        })
                        .then((res) => {
                            this.list = res.data.toDoList;
                        })
                        .catch((error) => {
                            console.error(error);
                        });
                },
            }
        });
    </script>
@endsection
