@extends('layouts.app-template')
@section('content')
<div class="row" data-plugin="matchHeight" data-by-row="true">
        <!-- First Row -->
        <!-- Completed Options Pie Widgets -->
        <div class="col-xxl-3">
          <div class="row h-full" data-plugin="matchHeight">
            <div class="col-xxl-12 col-lg-4 col-sm-4">
              <div class="card card-shadow card-completed-options">
                <div class="card-block p-30">
                  <div class="row">
                    <div class="col-6">
                      <div class="counter text-left blue-grey-700">
                        <div class="counter-label mt-10">Tasks Completed
                        </div>
                        <div class="counter-number font-size-40 mt-10">
                          1,234
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="pie-progress pie-progress-sm" data-plugin="pieProgress" data-valuemax="100"
                      data-barcolor="#57c7d4" data-size="100" data-barsize="10"
                      data-goal="86" aria-valuenow="86" role="progressbar">
                        <span class="pie-progress-number blue-grey-700 font-size-20">
                          86%
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-12 col-lg-4 col-sm-4">
              <div class="card card-shadow card-completed-options">
                <div class="card-block p-30">
                  <div class="row">
                    <div class="col-6">
                      <div class="counter text-left blue-grey-700">
                        <div class="counter-label mt-10">Points Completed
                        </div>
                        <div class="counter-number font-size-40 mt-10">
                          698
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="pie-progress pie-progress-sm" data-plugin="pieProgress" data-valuemax="100"
                      data-barcolor="#62a8ea" data-size="100" data-barsize="10"
                      data-goal="62" aria-valuenow="62" role="progressbar">
                        <span class="pie-progress-number blue-grey-700 font-size-20">
                          62%
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-12 col-lg-4 col-sm-4">
              <div class="card card-shadow card-completed-options">
                <div class="card-block p-30">
                  <div class="row">
                    <div class="col-6">
                      <div class="counter text-left blue-grey-700">
                        <div class="counter-label mt-10">Cards Completed
                        </div>
                        <div class="counter-number font-size-40 mt-10">
                          1,358
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="pie-progress pie-progress-sm" data-plugin="pieProgress" data-valuemax="100"
                      data-barcolor="#926dde" data-size="100" data-barsize="10"
                      data-goal="56" aria-valuenow="56" role="progressbar">
                        <span class="pie-progress-number blue-grey-700 font-size-20">
                          56%
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Completed Options Pie Widgets -->
        <!-- Team Total Completed -->
        <div class="col-xxl-9">
          <div id="teamCompletedWidget" class="card card-shadow example-responsive">
            <div class="card-block p-20 pb-25">
              <div class="row pb-40" data-plugin="matchHeight">
                <div class="col-md-6">
                  <div class="counter text-left pl-10">
                    <div class="counter-label">Team Total Completed</div>
                    <div class="counter-number-group text-truncate">
                      <span>1,439</span>
                      <span>86%</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <ul class="list-inline mr-50">
                    <li class="list-inline-item">
                      Task Completed
                    </li>
                    <li class="list-inline-item">
                      Cards Completed
                    </li>
                  </ul>
                </div>
              </div>
              <div class="ct-chart"></div>
            </div>
          </div>
        </div>
        <!-- End Team Total Completed -->
        <!-- End First Row -->
        <!-- Second Row -->
        <!-- Personal -->
        <div class="col-xxl-4 col-xl-6 col-lg-6">
          <div id="personalCompletedWidget" class="card card-shadow pb-20">
            <div class="card-header card-header-transparent cover overlay">
              <img class="cover-image" src="{{ asset("/global/photos/placeholder.png") }}") }}">
              <div class="overlay-panel overlay-background vertical-align">
                <div class="vertical-align-middle">
                  <a class="avatar" href="javascript:void(0)">
                    <img alt="" src="{{ asset("/global/portraits/4.jpg") }}") }}">
                  </a>
                  <div class="font-size-20 mt-10">MACHI</div>
                  <div class="font-size-14">machidesign@163.com</div>
                </div>
              </div>
            </div>
            <div class="card-block">
              <div class="row text-center mb-20">
                <div class="col-6">
                  <div class="counter">
                    <div class="counter-label total-completed">TOTAL COMPLETED</div>
                    <div class="counter-number red-600">1,628</div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="counter">
                    <div class="counter-label">TOTAL TIME</div>
                    <div class="counter-number blue-600">17</div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <caption>TODAY STATISTIC</caption>
                  <tbody>
                    <tr>
                      <td>
                        Tasks Completed
                      </td>
                      <td>
                        <div class="progress progress-xs mb-0">
                          <div class="progress-bar progress-bar-info bg-blue-600" role="progressbar" aria-valuenow="90"
                          aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                          </div>
                        </div>
                      </td>
                      <td>
                        90%
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Cards Completed
                      </td>
                      <td>
                        <div class="progress progress-xs mb-0">
                          <div class="progress-bar progress-bar-info bg-green-600" role="progressbar" aria-valuenow="86"
                          aria-valuemin="0" aria-valuemax="100" style="width: 86%">
                          </div>
                        </div>
                      </td>
                      <td>
                        86%
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Points Completed
                      </td>
                      <td>
                        <div class="progress progress-xs mb-0">
                          <div class="progress-bar progress-bar-info bg-red-600" role="progressbar" aria-valuenow="68"
                          aria-valuemin="0" aria-valuemax="100" style="width: 68%">
                          </div>
                        </div>
                      </td>
                      <td>
                        68%
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- End Personal -->
        <!-- To Do List -->
        <div class="col-xxl-4 col-xl-6 col-lg-6">
          <div id="toDoListWidget" class="card card-shadow card-lg pb-20">
            <div class="card-header card-header-transparent">
              <div class="card-header-actions">
                <a id="addNewItemBtn" href="javascript:void(0)" class="add-item-toggle">
                  <i class="icon wb-plus" aria-hidden="true"></i>
                </a>
              </div>
              <h5 class="card-title">TO DO LIST</h5>
            </div>
            <ul class="list-group h-500" data-plugin="scrollable">
              <div data-role="container">
                <div data-role="content">
                  <li class="list-group-item">
                    <div class="checkbox-custom checkbox-success checkbox-lg">
                      <input type="checkbox" name="checkbox" checked="checked">
                      <label class="item-title">Edit meeting record</label>
                    </div>
                    <div class="item-due-date">
                      <span>Tue,aug 25</span>
                    </div>
                    <ul class="item-members">
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/3.jpg") }}") }}">
                        <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                          <i class="icon wb-pencil" aria-hidden="true"></i>
                        </button>
                      </li>
                    </ul>
                  </li>
                  <li class="list-group-item">
                    <div class="checkbox-custom checkbox-success checkbox-lg">
                      <input type="checkbox" name="checkbox" checked="checked">
                      <label class="item-title">Upload Photos and Video</label>
                    </div>
                    <div class="item-due-date">
                      <span>Tue,aug 25</span>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="checkbox-custom checkbox-success checkbox-lg">
                      <input type="checkbox" name="checkbox">
                      <label class="item-title">Edit the blog system</label>
                    </div>
                    <div class="item-due-date">
                      <span>No due date</span>
                    </div>
                    <ul class="item-members">
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/1.jpg") }}") }}">
                        <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                          <i class="icon wb-pencil" aria-hidden="true"></i>
                        </button>
                      </li>
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/5.jpg") }}") }}">
                        <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                          <i class="icon wb-pencil" aria-hidden="true"></i>
                        </button>
                      </li>
                    </ul>
                  </li>
                  <li class="list-group-item">
                    <div class="checkbox-custom checkbox-success checkbox-lg">
                      <input type="checkbox" name="checkbox">
                      <label class="item-title">Edit the blog system</label>
                    </div>
                    <div class="item-due-date">
                      <span>No due date</span>
                    </div>
                    <ul class="item-members">
                      <li>
                        <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                          <i class="icon wb-pencil" aria-hidden="true"></i>
                        </button>
                      </li>
                    </ul>
                  </li>
                  <li class="list-group-item">
                    <div class="checkbox-custom checkbox-success checkbox-lg">
                      <input type="checkbox" name="checkbox">
                      <label class="item-title">Edit the blog system</label>
                    </div>
                    <div class="item-due-date">
                      <span>No due date</span>
                    </div>
                    <ul class="item-members">
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/4.jpg") }}") }}">
                        <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                          <i class="icon wb-pencil" aria-hidden="true"></i>
                        </button>
                      </li>
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/6.jpg") }}") }}">
                        <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                          <i class="icon wb-pencil" aria-hidden="true"></i>
                        </button>
                      </li>
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/7.jpg") }}") }}">
                        <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                          <i class="icon wb-pencil" aria-hidden="true"></i>
                        </button>
                      </li>
                    </ul>
                  </li>
                  <li class="list-group-item">
                    <div class="checkbox-custom checkbox-success checkbox-lg">
                      <input type="checkbox" name="checkbox" checked="checked">
                      <label class="item-title">Edit meeting record</label>
                    </div>
                    <div class="item-due-date">
                      <span>Tue,aug 25</span>
                    </div>
                    <ul class="item-members">
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/3.jpg") }}") }}">
                        <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                          <i class="icon wb-pencil" aria-hidden="true"></i>
                        </button>
                      </li>
                    </ul>
                  </li>
                  <li class="list-group-item">
                    <div class="checkbox-custom checkbox-success checkbox-lg">
                      <input type="checkbox" name="checkbox" checked="checked">
                      <label class="item-title">Upload Photos and Video</label>
                    </div>
                    <div class="item-due-date">
                      <span>Tue,aug 25</span>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="checkbox-custom checkbox-success checkbox-lg">
                      <input type="checkbox" name="checkbox">
                      <label class="item-title">Edit the blog system</label>
                    </div>
                    <div class="item-due-date">
                      <span>No due date</span>
                    </div>
                    <ul class="item-members">
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/1.jpg") }}") }}">
                        <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                          <i class="icon wb-pencil" aria-hidden="true"></i>
                        </button>
                      </li>
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/5.jpg") }}") }}">
                        <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                          <i class="icon wb-pencil" aria-hidden="true"></i>
                        </button>
                      </li>
                    </ul>
                  </li>
                  <li class="list-group-item">
                    <div class="checkbox-custom checkbox-success checkbox-lg">
                      <input type="checkbox" name="checkbox">
                      <label class="item-title">Edit the blog system</label>
                    </div>
                    <div class="item-due-date">
                      <span>No due date</span>
                    </div>
                    <ul class="item-members">
                      <li>
                        <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                          <i class="icon wb-pencil" aria-hidden="true"></i>
                        </button>
                      </li>
                    </ul>
                  </li>
                  <li class="list-group-item">
                    <div class="checkbox-custom checkbox-success checkbox-lg">
                      <input type="checkbox" name="checkbox">
                      <label class="item-title">Edit the blog system</label>
                    </div>
                    <div class="item-due-date">
                      <span>No due date</span>
                    </div>
                    <ul class="item-members">
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/4.jpg") }}") }}">
                        <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                          <i class="icon wb-pencil" aria-hidden="true"></i>
                        </button>
                      </li>
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/6.jpg") }}") }}">
                        <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                          <i class="icon wb-pencil" aria-hidden="true"></i>
                        </button>
                      </li>
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/7.jpg") }}") }}">
                        <button class="btn btn-sm btn-icon btn-default btn-outline btn-round">
                          <i class="icon wb-pencil" aria-hidden="true"></i>
                        </button>
                      </li>
                    </ul>
                  </li>
                </div>
              </div>
            </ul>
          </div>
        </div>
        <!-- End To Do List -->
        <!-- Recent Activity -->
        <div class="col-xxl-4">
          <div id="recentActivityWidget" class="card card-shadow card-lg pb-20">
            <div class="card-header card-header-transparent pb-10">
              <div class="card-header-actions">
                <span class="badge badge-default badge-round">VIEW ALL</span>
              </div>
              <h5 class="card-title">
                RECENT ACTIVITY
              </h5>
            </div>
            <ul class="timeline timeline-icon">
              <li class="timeline-reverse timeline-item">
                <div class="timeline-content-wrap">
                  <div class="timeline-dot bg-green-600">
                    <i class="icon wb-chat" aria-hidden="true"></i>
                  </div>
                  <div class="timeline-content">
                    <div class="title">
                      <span class="authors">Victor Erixon</span> assigned to a task
                    </div>
                    <div class="metas">
                      active 14 minutes ago
                    </div>
                    <ul class="members">
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/7.jpg") }}") }}">
                      </li>
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/6.jpg") }}") }}">
                      </li>
                      <li>
                        <img class="avatar avatar-sm" src="{{ asset("/global/portraits/8.jpg") }}") }}">
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="timeline-reverse timeline-item">
                <div class="timeline-content-wrap">
                  <div class="timeline-dot bg-blue-600">
                    <i class="icon wb-image" aria-hidden="true"></i>
                  </div>
                  <div class="timeline-content">
                    <div class="title">
                      <span class="authors">Alex Bender</span>uploaded 3 photos
                    </div>
                    <div class="metas">
                      active 2 hours ago
                    </div>
                    <ul class="photos">
                      <li class="cover">
                        <img class="cover-image" src="{{ asset("/global/photos/placeholder.png") }}") }}">
                      </li>
                      <li class="cover">
                        <img class="cover-image" src="{{ asset("/global/photos/placeholder.png") }}") }}">
                      </li>
                      <li class="cover">
                        <img class="cover-image" src="{{ asset("/global/photos/placeholder.png") }}") }}">
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="timeline-reverse timeline-item">
                <div class="timeline-content-wrap">
                  <div class="timeline-dot bg-cyan-600">
                    <i class="icon wb-file" aria-hidden="true"></i>
                  </div>
                  <div class="timeline-content">
                    <div class="title">
                      <span class="authors">Jeff Erixon</span>
                      invite you to attend topic discussion in
                      <span class="room-number">B205</span>
                      classroom
                    </div>
                    <div class="metas">
                      active 4 hours ago
                    </div>
                    <div class="tags">
                      As user experience designers we have to find the sweet spot
                    </div>
                  </div>
                </div>
              </li>
              <li class="timeline-reverse timeline-item">
                <div class="timeline-content-wrap">
                  <div class="timeline-dot bg-orange-600">
                    <i class="icon wb-map" aria-hidden="true"></i>
                  </div>
                  <div class="timeline-content">
                    <div class="title">
                      <span class="authors">Jeff Erixon</span>
                      invite you to attend topic discussion in
                      <span class="room-number">B205</span>
                      classroom
                    </div>
                    <div class="metas">
                      active 3 hours ago
                    </div>
                    <ul class="operates">
                      <li>
                        <button class="btn btn-outline btn-success btn-round">Accept</button>
                      </li>
                      <li>
                        <button class="btn btn-outline btn-danger btn-round">Refuse</button>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- End Recent Activity -->
        <!-- End Second Row -->
      </div>

@endsection
