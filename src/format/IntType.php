<?php
namespace jocoon\parquet\format;

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
 * Integer logical type annotation
 * 
 * bitWidth must be 8, 16, 32, or 64.
 * 
 * Allowed for physical types: INT32, INT64
 */
class IntType
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'bitWidth',
            'isRequired' => true,
            'type' => TType::BYTE,
        ),
        2 => array(
            'var' => 'isSigned',
            'isRequired' => true,
            'type' => TType::BOOL,
        ),
    );

    /**
     * @var int
     */
    public $bitWidth = null;
    /**
     * @var bool
     */
    public $isSigned = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['bitWidth'])) {
                $this->bitWidth = $vals['bitWidth'];
            }
            if (isset($vals['isSigned'])) {
                $this->isSigned = $vals['isSigned'];
            }
        }
    }

    public function getName()
    {
        return 'IntType';
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
                    if ($ftype == TType::BYTE) {
                        $xfer += $input->readByte($this->bitWidth);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->isSigned);
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
        $xfer += $output->writeStructBegin('IntType');
        if ($this->bitWidth !== null) {
            $xfer += $output->writeFieldBegin('bitWidth', TType::BYTE, 1);
            $xfer += $output->writeByte($this->bitWidth);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->isSigned !== null) {
            $xfer += $output->writeFieldBegin('isSigned', TType::BOOL, 2);
            $xfer += $output->writeBool($this->isSigned);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}