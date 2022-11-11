<?php
namespace hongkai\parquet\format;

/**
 * Autogenerated by Thrift Compiler (0.13.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

/**
 * Data page header
 */
class DataPageHeader
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'num_values',
            'isRequired' => true,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'encoding',
            'isRequired' => true,
            'type' => TType::I32,
        ),
        3 => array(
            'var' => 'definition_level_encoding',
            'isRequired' => true,
            'type' => TType::I32,
        ),
        4 => array(
            'var' => 'repetition_level_encoding',
            'isRequired' => true,
            'type' => TType::I32,
        ),
        5 => array(
            'var' => 'statistics',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkai\parquet\format\Statistics',
        ),
    );

    /**
     * Number of values, including NULLs, in this data page. *
     * 
     * @var int
     */
    public $num_values = null;
    /**
     * Encoding used for this data page *
     * 
     * @var int
     */
    public $encoding = null;
    /**
     * Encoding used for definition levels *
     * 
     * @var int
     */
    public $definition_level_encoding = null;
    /**
     * Encoding used for repetition levels *
     * 
     * @var int
     */
    public $repetition_level_encoding = null;
    /**
     * Optional statistics for the data in this page*
     * 
     * @var \hongkai\parquet\format\Statistics
     */
    public $statistics = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['num_values'])) {
                $this->num_values = $vals['num_values'];
            }
            if (isset($vals['encoding'])) {
                $this->encoding = $vals['encoding'];
            }
            if (isset($vals['definition_level_encoding'])) {
                $this->definition_level_encoding = $vals['definition_level_encoding'];
            }
            if (isset($vals['repetition_level_encoding'])) {
                $this->repetition_level_encoding = $vals['repetition_level_encoding'];
            }
            if (isset($vals['statistics'])) {
                $this->statistics = $vals['statistics'];
            }
        }
    }

    public function getName()
    {
        return 'DataPageHeader';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->num_values);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->encoding);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->definition_level_encoding);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->repetition_level_encoding);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRUCT) {
                        $this->statistics = new \hongkai\parquet\format\Statistics();
                        $xfer += $this->statistics->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('DataPageHeader');
        if ($this->num_values !== null) {
            $xfer += $output->writeFieldBegin('num_values', TType::I32, 1);
            $xfer += $output->writeI32($this->num_values);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->encoding !== null) {
            $xfer += $output->writeFieldBegin('encoding', TType::I32, 2);
            $xfer += $output->writeI32($this->encoding);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->definition_level_encoding !== null) {
            $xfer += $output->writeFieldBegin('definition_level_encoding', TType::I32, 3);
            $xfer += $output->writeI32($this->definition_level_encoding);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->repetition_level_encoding !== null) {
            $xfer += $output->writeFieldBegin('repetition_level_encoding', TType::I32, 4);
            $xfer += $output->writeI32($this->repetition_level_encoding);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->statistics !== null) {
            if (!is_object($this->statistics)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('statistics', TType::STRUCT, 5);
            $xfer += $this->statistics->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
