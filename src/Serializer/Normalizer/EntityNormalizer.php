<?php

namespace App\Serializer\Normalizer;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactoryInterface;
use Symfony\Component\Serializer\NameConverter\NameConverterInterface;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;

/**
 * Entity normalizer
 */
class EntityNormalizer extends ObjectNormalizer
{
    /**
     * Entity manager
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $em;

    /**
     * Entity normalizer
     * @param EntityManagerInterface $em
     * @param ClassMetadataFactoryInterface|null $classMetadataFactory
     * @param NameConverterInterface|null $nameConverter
     * @param PropertyAccessorInterface|null $propertyAccessor
     * @param PropertyTypeExtractorInterface|null $propertyTypeExtractor
     */
    public function __construct(
        EntityManagerInterface $em,
        ?ClassMetadataFactoryInterface $classMetadataFactory = null,
        ?NameConverterInterface $nameConverter = null,
        ?PropertyAccessorInterface $propertyAccessor = null,
        ?PropertyTypeExtractorInterface $propertyTypeExtractor = null
    )
    {
        parent::__construct($classMetadataFactory, $nameConverter, $propertyAccessor, $propertyTypeExtractor);
        $this->em = $em;
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return str_starts_with($type, 'App\\Entity\\') && (is_numeric($data) || is_string($data));
    }

    /**
     * Never use this class for normalization. The abstract implementation occasionally returns true
     * @param mixed $data
     * @param string|null $format
     * @return bool
     */
    public function supportsNormalization($data, string $format = null): bool
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $type, $format = null, array $context = [])
    {
        return $this->em->find($type, $data);
    }
}