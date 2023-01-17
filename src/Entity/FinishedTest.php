<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="finished_test")
 *
 */

class FinishedTest
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $testName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $serviceName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=1000)
     */
    protected $url;

    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(type="datetime")
     */
    protected $testTime;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $result;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    protected $errorInfo;

    public function __construct()
    {
        $this->testTime = new \DateTimeImmutable();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return FinishedTest
     */
    public function setId(int $id): FinishedTest
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTestName(): string
    {
        return $this->testName;
    }

    /**
     * @param string $testName
     * @return FinishedTest
     */
    public function setTestName(string $testName): FinishedTest
    {
        $this->testName = $testName;
        return $this;
    }

    /**
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    /**
     * @param string $serviceName
     * @return FinishedTest
     */
    public function setServiceName(string $serviceName): FinishedTest
    {
        $this->serviceName = $serviceName;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return FinishedTest
     */
    public function setUrl(string $url): FinishedTest
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getTestTime(): \DateTimeImmutable
    {
        return $this->testTime;
    }

    /**
     * @param \DateTimeImmutable $testTime
     * @return FinishedTest
     */
    public function setTestTime(\DateTimeImmutable $testTime): FinishedTest
    {
        $this->testTime = $testTime;
        return $this;
    }

    /**
     * @return bool
     */
    public function isResult(): bool
    {
        return $this->result;
    }

    /**
     * @param bool $result
     * @return FinishedTest
     */
    public function setResult(bool $result): FinishedTest
    {
        $this->result = $result;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorInfo(): string
    {
        return $this->errorInfo;
    }

    /**
     * @param string|null $errorInfo
     * @return FinishedTest
     */
    public function setErrorInfo(?string $errorInfo): FinishedTest
    {
        $this->errorInfo = $errorInfo;
        return $this;
    }
}
