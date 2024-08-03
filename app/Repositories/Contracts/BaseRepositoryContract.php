<?php

namespace App\Repositories\Contracts;

use IntlChar;

interface BaseRepositoryContract
{

    /**
     * Summary of all
     * @param array $colums
     * 
     */
    public function all();

    /**
     * @param int $perPage
     * @param array $colums
     * @return mixed
     */
    public function paginate($perPage = 15, $colums = array('*'));


    public function create(array $data);


    public function update($id, array $data);


    public function delete($id);

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws RepositoryException
     */
    public function makeModel();

    /**
     * @param int
     * @param array $colums
     * @return mixed
     */
    public function find($id, $colums = array('*'));

    public function findBy($attribute, $value, $colums = array('*'));


    public function findOrFail($id, $colums = array('*'));


    public function findOrFailBy($attribute, $value, $colums = array('*'));
}
