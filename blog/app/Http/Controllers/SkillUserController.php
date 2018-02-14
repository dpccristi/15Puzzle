<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSkillUserRequest;
use App\Http\Requests\UpdateSkillUserRequest;
use App\Repositories\SkillUserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SkillUserController extends AppBaseController
{
    /** @var  SkillUserRepository */
    private $skillUserRepository;

    public function __construct(SkillUserRepository $skillUserRepo)
    {
        $this->skillUserRepository = $skillUserRepo;
    }

    /**
     * Display a listing of the SkillUser.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->skillUserRepository->pushCriteria(new RequestCriteria($request));
        $skillUsers = $this->skillUserRepository->all();

        return view('skill_users.index')
            ->with('skillUsers', $skillUsers);
    }

    /**
     * Show the form for creating a new SkillUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('skill_users.create');
    }

    /**
     * Store a newly created SkillUser in storage.
     *
     * @param CreateSkillUserRequest $request
     *
     * @return Response
     */
    public function store(CreateSkillUserRequest $request)
    {
        $input = $request->all();

        $skillUser = $this->skillUserRepository->create($input);

        Flash::success('Skill User saved successfully.');

        return redirect(route('skillUsers.index'));
    }

    /**
     * Display the specified SkillUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $skillUser = $this->skillUserRepository->findWithoutFail($id);

        if (empty($skillUser)) {
            Flash::error('Skill User not found');

            return redirect(route('skillUsers.index'));
        }

        return view('skill_users.show')->with('skillUser', $skillUser);
    }

    /**
     * Show the form for editing the specified SkillUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $skillUser = $this->skillUserRepository->findWithoutFail($id);

        if (empty($skillUser)) {
            Flash::error('Skill User not found');

            return redirect(route('skillUsers.index'));
        }

        return view('skill_users.edit')->with('skillUser', $skillUser);
    }

    /**
     * Update the specified SkillUser in storage.
     *
     * @param  int              $id
     * @param UpdateSkillUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSkillUserRequest $request)
    {
        $skillUser = $this->skillUserRepository->findWithoutFail($id);

        if (empty($skillUser)) {
            Flash::error('Skill User not found');

            return redirect(route('skillUsers.index'));
        }

        $skillUser = $this->skillUserRepository->update($request->all(), $id);

        Flash::success('Skill User updated successfully.');

        return redirect(route('skillUsers.index'));
    }

    /**
     * Remove the specified SkillUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $skillUser = $this->skillUserRepository->findWithoutFail($id);

        if (empty($skillUser)) {
            Flash::error('Skill User not found');

            return redirect(route('skillUsers.index'));
        }

        $this->skillUserRepository->delete($id);

        Flash::success('Skill User deleted successfully.');

        return redirect(route('skillUsers.index'));
    }
}
