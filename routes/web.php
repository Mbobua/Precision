<?php

use App\Http\Controllers\AgentTicketsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NaboTicketsController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TicketReOpeningController;
use App\Http\Controllers\TicketsController;
use App\Http\Livewire\Admin\AddUserComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCompanyComponent;
use App\Http\Livewire\Admin\AdminIndividualTicketComponent;
use App\Http\Livewire\Admin\AdminSearchComponent;
use App\Http\Livewire\Admin\AdminViewTicketDetailsComponent;
use App\Http\Livewire\Admin\AssignedTicketsComponent;
use App\Http\Livewire\Admin\CustomRequestTicketComponent;
use App\Http\Livewire\Admin\EditTicketDetailsComponent;
use App\Http\Livewire\Admin\FromEmailTicketComponent;
use App\Http\Livewire\Admin\KnowledgeCenterComponent;
use App\Http\Livewire\Admin\LibraryComponent;
use App\Http\Livewire\Admin\ListOfUsersComponent;
use App\Http\Livewire\Admin\MyRaisedTicketComponent;
use App\Http\Livewire\Admin\TicketDetailsComponent;
use App\Http\Livewire\Admin\TicketFormComponent;
use App\Http\Livewire\Admin\TicketReportsComponent;
use App\Http\Livewire\Admin\UserProfile;
use App\Http\Livewire\Admin\UserSettingsComponent;
use App\Http\Livewire\Agent\AccountCenterComponent;
use App\Http\Livewire\Agent\AgentAssignedTicketsComponent;
use App\Http\Livewire\Agent\AgentCustomTicketComponent;
use App\Http\Livewire\Agent\AgentEditTicketDetailsComponent;
use App\Http\Livewire\Agent\AgentIndividualTicketComponent;
use App\Http\Livewire\Agent\AgentSettingsComponent;
use App\Http\Livewire\Agent\AgentTicketReportsComponent;
use App\Http\Livewire\Agent\MyRaisedTicketsComponent;
use App\Http\Livewire\Agent\MyTicketsComponent;
use App\Http\Livewire\AssetComponent;
use App\Http\Livewire\CompanyComponent;
use App\Http\Livewire\Demo\DemoDashboardComponent;
use App\Http\Livewire\Employee\EmployeeDashboardComponent;
use App\Http\Livewire\Employee\EmployeeSettingsComponent;
use App\Http\Livewire\Employee\IndividualTicketComponent;
use App\Http\Livewire\Employee\MySolvedTicketsComponent;
use App\Http\Livewire\Employee\TicketsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Nabo\ExternalTicketComponent;
use App\Http\Livewire\Nabo\FirstUserPage;
use App\Http\Livewire\Nabo\ListOfTicketsComponent;
use App\Http\Livewire\Nabo\MyTicketDetailsComponent;
use App\Http\Livewire\Nabo\NaboAssignedTicketsComponent;
use App\Http\Livewire\Nabo\NaboDashboardComponent;
use App\Http\Livewire\Nabo\NaboEditTicketDetailsComponent;
use App\Http\Livewire\Nabo\NaboRaisedTicketsComponent;
use App\Http\Livewire\Nabo\TierDataTicketDetailsComponent;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class,'welcome']);

Route::get('/home', HomeComponent::class)->name('default-user.home');

Route::get('/', [RouteController::class, 'home'])->name('home');
Route::get('/signin',[AuthController::class,'signin']);
Route::get('/callback',[AuthController::class,'callback']);

//For Demo
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/demo/dashboard', DemoDashboardComponent::class)->name('demo.dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/demo/dashboard', DemoDashboardComponent::class)->name('demo.dashboard');
});

Route::post('user/edit', [RouteController::class, 'editUser'])->name('user.edit');


//For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/dashboard/companies', CompanyComponent::class)->name('home.companies');
    Route::get('/admin/dashboard/assets', AssetComponent::class)->name('home.assets');
    Route::get('/admin/dashboard/all-tickets', AdminSearchComponent::class)->name('admin.all-tickets');
    Route::get('/admin/dashboard/companies/edit/{company_id}', AdminEditCompanyComponent::class)->name('admin.edit_company');
    Route::get('/admin/dashboard/ticket-details', TicketDetailsComponent::class)->name('ticket.details');
    Route::get('/admin/dashboard/my-assigned-tickets', AssignedTicketsComponent::class)->name('ticket.assigned-tickets');
    Route::post('/admin/solver/set', [AdminDashboardComponent::class, 'setSolver'])->name('solver.set');
    Route::post('/admin/desk/set', [AdminSearchComponent::class, 'deskSet'])->name('desk.set');
    Route::get('/admin/dashboard/my-assigned-tickets/details/{ticket}', EditTicketDetailsComponent::class)->name('admin.edit-ticket');
    Route::post('/admin/dashboard/my-assigned-tickets/update/{ticket}', [TicketsController::class, 'updateStatus'])->name('admin.update-ticket');Route::get('/admin/dashboard/ticket-reports', TicketReportsComponent::class)->name('admin.ticket-report');

    Route::post('/admin/dashboard/my-tickets/details/update/{ticketItem}', [TicketReOpeningController::class, 'reopenTicket'])->name('admin.reopen-ticket');

    Route::get('/admin/dashboard/custom-ticket-request', CustomRequestTicketComponent::class)->name('admin.custom-ticket-request');
    Route::post('/admin/dashboard/custom-ticket-submit', [CustomRequestTicketComponent::class, 'submitCustomTicket'])->name('admin.custom-ticket.submit');
    Route::get('/admin/dashboard/list-of-users',ListOfUsersComponent::class)->name('admin.list-of-users');
    Route::get('/admin/dashboard/add-new-user',AddUserComponent::class)->name('admin.new-user');
    Route::post('/admin/dashboard/add/user',[AddUserComponent::class, 'addUser'])->name('admin.add-new-user');
    Route::get('/admin/dashboard/tickets-from-emails',FromEmailTicketComponent::class)->name('admin.tickets-from-email');
    Route::get('/admin/dashboard/ticket-form',TicketFormComponent::class)->name('admin.ticket-form');
    Route::get('/admin/dashboard/my-tickets',MyRaisedTicketComponent::class)->name('admin.my-raised-tickets');
    Route::post('/admin/ticket/submit', [TicketFormComponent::class, 'submitTicket'])->name('admin.ticket.submit');
    Route::get('/admin/dashboard/my-tickets/details/{ticket_id}', AdminIndividualTicketComponent::class)->name('admin.my-ticket-detail');
    Route::get('/admin/dashboard/list-of-users/user-profile/{user}', UserProfile::class)->name('admin.user-profile');
    Route::get('/admin/dashboard/ticket-details/{ticket}',AdminViewTicketDetailsComponent::class)->name('admin.view-ticket-details');
    Route::get('/admin/dashboard/knowledge-center-articles',KnowledgeCenterComponent::class)->name('admin.knowledge-based-center');
    Route::get('/admin/dashboard/knowledge-library',LibraryComponent::class)->name('admin.library-list');
    Route::post('/admin/delegator/set', [AssignedTicketsComponent::class, 'setDelegatee'])->name('delegator.set');
    Route::get('/admin/dashboard/settings', UserSettingsComponent::class)->name('admin.dashboard.settings');
    Route::post('/admin/dashboard/save-changes', [UserSettingsComponent::class, 'updateProfile'])->name('user.save.changes');
    Route::post('/admin/my-ticket-rating',[AdminIndividualTicketComponent::class,'addReview'])->name('admin.ticket.rating');


});

// --------------------Login-with-Google-------------------------------

Route::get('auth/redirect', 'App\Http\Controllers\SocialController@redirect');
Route::get('auth/callback', 'App\Http\Controllers\SocialController@callback');

//For Agent
Route::middleware(['auth:sanctum', 'verified', 'authagent'])->group(function () {
    Route::get('/agent/dashboard/my-assigned-tickets', AgentAssignedTicketsComponent::class)->name('ticket.agent-assigned-tickets');
    Route::get('/agent/dashboard/my-assigned-tickets/details/{ticket}', AgentEditTicketDetailsComponent::class)->name('agent.edit-ticket');
    Route::post('/agent/dashboard/my-assigned-tickets/update/{ticket}', [AgentTicketsController::class, 'updateStatus'])->name('agent.update-ticket');
    Route::get('/agent/dashboard/ticket-reports', AgentTicketReportsComponent::class)->name('agent.ticket-report');
    Route::get('/agent/dashboard/ticket-form',MyTicketsComponent::class)->name('agent.ticket-form');
    Route::get('/agent/dashboard/my-raised-tickets',MyRaisedTicketsComponent::class)->name('agent.my-raised-tickets');
    Route::post('/agent/ticket/submit', [MyTicketsComponent::class, 'submitTicket'])->name('agent.ticket.submit');
    Route::get('/agent/dashboard/my-raised-tickets/details/{ticket}', AgentIndividualTicketComponent::class)->name('agent.my-ticket-detail');
    Route::get('/agent/dashboard/account-center',AccountCenterComponent::class)->name('agent.account-center');
    Route::get('/agent/dashboard/settings', AgentSettingsComponent::class)->name('agent.dashboard.settings');
    Route::post('/agent/dashboard/save-changes', [AgentSettingsComponent::class, 'updateProfile'])->name('agent.save.changes');
    Route::post('/agent/delegator/set', [AgentAssignedTicketsComponent::class, 'agentSetDelegatee'])->name('agent.delegator.set');
    Route::get('/agent/dashboard/custom-ticket-request', AgentCustomTicketComponent::class)->name('agent.custom-ticket-request');
    Route::post('/agent/dashboard/custom-ticket-submit', [AgentCustomTicketComponent::class, 'agentCustomTicket'])->name('agent.custom-ticket.submit');

});

//For Employee
Route::middleware(['auth:sanctum', 'verified', 'defaultauth'])->group(function () {
    Route::get('/employee/dashboard', EmployeeDashboardComponent::class)->name('employee.dashboard');
    Route::get('/employee/dashboard/my-tickets', TicketsComponent::class)->name('employee.my-tickets');
    Route::post('/employee/ticket/submit', [EmployeeDashboardComponent::class, 'submitTicket'])->name('employee.ticket.submit');
    Route::get('/employee/dashboard/my-solved-tickets',MySolvedTicketsComponent::class)->name('employee.my-solved-tickets');
    Route::get('/employee/dashboard/my-tickets/details/{ticket_id}', IndividualTicketComponent::class)->name('employee.ticket-detail');
    Route::post('/employee/my-ticket-rating',[IndividualTicketComponent::class,'addReview'])->name('employee.ticket.rating');
    Route::get('/employee/dashboard/my-tickets/details/download-PDF/{ticket}',[IndividualTicketComponent::class,'downloadPDF'])->name('employee.download-pdf');
    Route::get('/employee/dashboard/settings', EmployeeSettingsComponent::class)->name('employee.dashboard.settings');
    Route::post('/employee/dashboard/save-changes', [EmployeeSettingsComponent::class, 'updateProfile'])->name('employee.save.changes');
    Route::post('/employee/dashboard/my-tickets/details/update/{ticketItem}', [TicketReOpeningController::class, 'reopenTicket'])->name('employee.reopen-ticket');


});

//For Nabo
Route::middleware(['auth:sanctum','verified','authnabo'])->group(function (){
    Route::get('/nabocapital/internal-ticket',NaboDashboardComponent::class)->name('nabostaff.dashboard');
    Route::get('/nabocapital/my-tickets',ListOfTicketsComponent::class)->name('my-IT-tickets.dashboard');
    Route::get('/nabocapital/my-tickets/details/{ticket}',TierDataTicketDetailsComponent::class)->name('nabo.it-td-ticket-details');
    Route::get('/nabocapital/IT-support-ticket', ExternalTicketComponent::class)->name('nabostaff.external');
    Route::get('/nabocapital/raised-nb-tickets',NaboRaisedTicketsComponent::class)->name('nabostaff.my-raised-nb-tickets');
    Route::get('/nabocapital/assigned-nb-tickets', NaboAssignedTicketsComponent::class)->name('nabostaff.my-assigned-nb-tickets');
    Route::post('/nabocapital/ticket/submit',[NaboDashboardComponent::class,'submitTicket'])->name('nabo.ticket-submit');
    Route::get('/nabocapital/raised-nb-tickets/details/{ticket}',MyTicketDetailsComponent::class)->name('nabo.ticket-detail');
    Route::get('/nabocapital/assigned-nb-tickets/details/{ticket}', NaboEditTicketDetailsComponent::class)->name('nabo.edit-ticket');
    Route::post('/nabocapital/assigned-nb-tickets/update/{ticket}', [NaboTicketsController::class, 'updateStatus'])->name('nabo.update-ticket');
    Route::post('/nabocapital/internal-ticket/submit', [ExternalTicketComponent::class, 'submitTicket'])->name('nabo.IT-ticket.submit');
    Route::get('/nabocapital/update-user-profile',FirstUserPage::class)->name('nabo.update-user-profile');


});

