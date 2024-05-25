<?php

namespace App\Admin\Repositories;

interface EloquentStandardRepositoryInterface
{
    /**
     * Return all records
     *
     * @return mixed
     */
    public function getAll();
    /**
     * Find a single record
     *
     * @param array $filter
     * @param array $relations
     * @return mixed
     * @throws \Exception
     */
    public function findByOrFail(array $filter, array $relations = []);
    /**
     * Find a single record
     *
     * @param array $filter
     * @param array $relations
     * @return mixed
     * @throws \Exception
     */
    public function findBy(array $filter, array $relations = []);
    /**
     * Find a single record
     *
     * @param int $id
     * @param array $relations
     * @return mixed
     * @throws \Exception
     */
    public function findOrFail($id, array $relations = []);
    /**
     * Find a single record
     *
     * @param int $id
     * @param array $relations
     * @return mixed
     * @throws \Exception
     */
    public function find($id, array $relations = []);
    /**
     * Create a new record
     *
     * @param array $data The input data
     * @return object model instance
     * @throws \Exception
     */
    public function create(array $data);

    /**
     * Update the model instance
     *
     * @param int $id The model id
     * @param array $data The input data
     * @return object model instance
     * @throws \Exception
     */
    public function update($id, array $data);
    /**
     * Delete a record
     *
     * @param int $id Model id
     * @return object model instance
     * @throws \Exception
     */
    public function delete($id);
    /**
     * Return all records
     *
     * @param array $relations
     * @param array $filter
     * @return mixed
     */
    public function getBy(array $filter, array $relations = []);
    /**
     * make query
     * 
     * @return mixed
     */
    public function getByQueryBuilder(array $filter, array $relations = []);
    /**
     * make query
     * 
     * @return mixed
     */
    public function getQueryBuilderOrderBy();
    /**
     * make query
     * 
     * @return mixed
     */
    public function getQueryBuilder();
    /**
     * policy
     * 
     * @param string $action
     * @param string $guard
     * 
     * @return boolean
     */
    public function authorize($action = 'view', $guard = 'web');
    /**
     * 
     * @return mixed
     */
    public function getInstance();
}