<?php

namespace Localheinz\ChangeLog;

use BadMethodCallException;

class Builder
{
    /**
     * @var Repository\PullRequest
     */
    private $pullRequestRepository;

    /**
     * @var string
     */
    private $userName;

    /**
     * @var string
     */
    private $repository;

    /**
     * @var string
     */
    private $startSha;

    /**
     * @var string
     */
    private $endSha;

    /**
     * @param Repository\PullRequest $pullRequestRepository
     */
    public function __construct(Repository\PullRequest $pullRequestRepository)
    {
        $this->pullRequestRepository = $pullRequestRepository;
    }

    /**
     * @param string $user
     * @return self
     */
    public function userName($user)
    {
        $this->userName = $user;

        return $this;
    }

    /**
     * @param string $repository
     * @return self
     */
    public function repository($repository)
    {
        $this->repository = $repository;

        return $this;
    }

    /**
     * @param string $startSha
     * @return self
     */
    public function startSha($startSha)
    {
        $this->startSha = $startSha;

        return $this;
    }

    /**
     * @param string $endSha
     * @return self
     */
    public function endSha($endSha)
    {
        $this->endSha = $endSha;

        return $this;
    }

    /**
     * @return array
     */
    public function pullRequests()
    {
        if (null === $this->userName) {
            throw new BadMethodCallException('User needs to be specified');
        }

        if (null === $this->repository) {
            throw new BadMethodCallException('Repository needs to be specified');
        }

        if (null === $this->startSha) {
            throw new BadMethodCallException('Start reference needs to be specified');
        }

        if (null === $this->endSha) {
            throw new BadMethodCallException('End reference needs to be specified');
        }

        return $this->pullRequestRepository->pullRequests(
            $this->userName,
            $this->repository,
            $this->startSha,
            $this->endSha
        );
    }
}