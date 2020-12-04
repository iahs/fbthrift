<?hh // strict
/**
 * Autogenerated by Thrift
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */

/**
 * Original thrift enum:-
 * MyEnum
 */
enum MyEnum: int {
  MyValue1 = 0;
  MyValue2 = 1;
}

class MyEnum_TEnumStaticMetadata implements \IThriftEnumStaticMetadata {
  public static function getAllStructuredAnnotations(): \TEnumAnnotations {
    return shape(
      'enum' => dict[],
      'constants' => dict[
      ],
    );
  }
}

/**
 * Original thrift exception:-
 * MyException1
 */
class MyException1 extends \TException implements \IThriftStruct {
  use \ThriftSerializationTrait;

  const dict<int, this::TFieldSpec> SPEC = dict[
    1 => shape(
      'var' => 'message',
      'type' => \TType::STRING,
    ),
    2 => shape(
      'var' => 'code',
      'type' => \TType::I32,
      'enum' => MyEnum::class,
    ),
  ];
  const dict<string, int> FIELDMAP = dict[
    'message' => 1,
    'code' => 2,
  ];

  const type TConstructorShape = shape(
    ?'message' => ?string,
    ?'code' => ?MyEnum,
  );

  const int STRUCTURAL_ID = 7711048519845400283;
  /**
   * Original thrift field:-
   * 1: string message
   */
  public string $message;
  /**
   * Original thrift field:-
   * 2: enum module.MyEnum code
   */
  public /* Originally defined as MyEnum */ int $code;

  public function setCodeAsEnum(MyEnum $code): void {
    /* HH_FIXME[4110] nontransparent enum */
    $this->code = $code;  
  }

  public function getCodeAsEnum(): MyEnum {
    /* HH_FIXME[4110] retain HHVM enforcement semantics */
    return $this->code;  
  }

  <<__Rx>>
  public function __construct(?string $message = null, ?MyEnum $code = null  ) {
    parent::__construct();
    $this->message = $message ?? '';
      /* HH_FIXME[4110] nontransparent Enum */
    $this->code = $code ?? MyEnum::MyValue1;
  }

  <<__Rx>>
  public static function withDefaultValues(): this {
    return new static();
  }

  <<__Rx>>
  public static function fromShape(self::TConstructorShape $shape): this {
    return new static(
      Shapes::idx($shape, 'message'),
      Shapes::idx($shape, 'code'),
    );
  }

  public function getName(): string {
    return 'MyException1';
  }

  public static function getAllStructuredAnnotations(): \TStructAnnotations {
    return shape(
      'struct' => dict[],
      'fields' => dict[
      ],
    );
  }

}

/**
 * Original thrift exception:-
 * MyException2
 */
class MyException2 extends \TException implements \IThriftStruct {
  use \ThriftSerializationTrait;

  const dict<int, this::TFieldSpec> SPEC = dict[
    1 => shape(
      'var' => 'message',
      'type' => \TType::STRING,
    ),
    2 => shape(
      'var' => 'code',
      'type' => \TType::I32,
      'enum' => MyEnum::class,
    ),
  ];
  const dict<string, int> FIELDMAP = dict[
    'message' => 1,
    'code' => 2,
  ];

  const type TConstructorShape = shape(
    ?'message' => ?string,
    ?'code' => ?MyEnum,
  );

  const int STRUCTURAL_ID = 3067783023341493113;
  /**
   * Original thrift field:-
   * 1: string message
   */
  public string $message;
  /**
   * Original thrift field:-
   * 2: enum module.MyEnum code
   */
  public /* Originally defined as MyEnum */ int $code;

  public function setCodeAsEnum(MyEnum $code): void {
    /* HH_FIXME[4110] nontransparent enum */
    $this->code = $code;  
  }

  public function getCodeAsEnum(): MyEnum {
    /* HH_FIXME[4110] retain HHVM enforcement semantics */
    return $this->code;  
  }

  <<__Rx>>
  public function __construct(?string $message = null, ?MyEnum $code = null  ) {
    parent::__construct();
    $this->message = $message ?? '';
      /* HH_FIXME[4110] nontransparent Enum */
    $this->code = $code ?? MyEnum::MyValue1;
  }

  <<__Rx>>
  public static function withDefaultValues(): this {
    return new static();
  }

  <<__Rx>>
  public static function fromShape(self::TConstructorShape $shape): this {
    return new static(
      Shapes::idx($shape, 'message'),
      Shapes::idx($shape, 'code'),
    );
  }

  public function getName(): string {
    return 'MyException2';
  }

  public static function getAllStructuredAnnotations(): \TStructAnnotations {
    return shape(
      'struct' => dict[],
      'fields' => dict[
      ],
    );
  }

}

/**
 * Original thrift exception:-
 * MyException3
 */
class MyException3 extends \TException implements \IThriftStruct {
  use \ThriftSerializationTrait;

  const dict<int, this::TFieldSpec> SPEC = dict[
    1 => shape(
      'var' => 'message',
      'type' => \TType::STRING,
    ),
    2 => shape(
      'var' => 'code',
      'type' => \TType::I32,
      'enum' => MyEnum::class,
    ),
  ];
  const dict<string, int> FIELDMAP = dict[
    'message' => 1,
    'code' => 2,
  ];

  const type TConstructorShape = shape(
    ?'message' => ?string,
    ?'code' => ?MyEnum,
  );

  const int STRUCTURAL_ID = 3517193566312570591;
  /**
   * Original thrift field:-
   * 1: string message
   */
  public string $message;
  /**
   * Original thrift field:-
   * 2: enum module.MyEnum code
   */
  public /* Originally defined as MyEnum */ int $code;

  public function setCodeAsEnum(MyEnum $code): void {
    /* HH_FIXME[4110] nontransparent enum */
    $this->code = $code;  
  }

  public function getCodeAsEnum(): MyEnum {
    /* HH_FIXME[4110] retain HHVM enforcement semantics */
    return $this->code;  
  }

  <<__Rx>>
  public function __construct(?string $message = null, ?MyEnum $code = null  ) {
    parent::__construct();
    $this->message = $message ?? '';
      /* HH_FIXME[4110] nontransparent Enum */
    $this->code = $code ?? MyEnum::MyValue1;
  }

  <<__Rx>>
  public static function withDefaultValues(): this {
    return new static();
  }

  <<__Rx>>
  public static function fromShape(self::TConstructorShape $shape): this {
    return new static(
      Shapes::idx($shape, 'message'),
      Shapes::idx($shape, 'code'),
    );
  }

  public function getName(): string {
    return 'MyException3';
  }

  public static function getAllStructuredAnnotations(): \TStructAnnotations {
    return shape(
      'struct' => dict[],
      'fields' => dict[
      ],
    );
  }

}

/**
 * Original thrift exception:-
 * MyException4
 */
class MyException4 extends \TException implements \IThriftStruct {
  use \ThriftSerializationTrait;

  const dict<int, this::TFieldSpec> SPEC = dict[
    1 => shape(
      'var' => 'message',
      'type' => \TType::STRING,
    ),
    2 => shape(
      'var' => 'code',
      'type' => \TType::I32,
      'enum' => MyEnum::class,
    ),
  ];
  const dict<string, int> FIELDMAP = dict[
    'message' => 1,
    'code' => 2,
  ];

  const type TConstructorShape = shape(
    ?'message' => ?string,
    ?'code' => ?MyEnum,
  );

  const int STRUCTURAL_ID = 3517193566312570591;
  /**
   * Original thrift field:-
   * 1: string message
   */
  public string $message;
  /**
   * Original thrift field:-
   * 2: enum module.MyEnum code
   */
  public /* Originally defined as MyEnum */ int $code;

  public function setCodeAsEnum(MyEnum $code): void {
    /* HH_FIXME[4110] nontransparent enum */
    $this->code = $code;  
  }

  public function getCodeAsEnum(): MyEnum {
    /* HH_FIXME[4110] retain HHVM enforcement semantics */
    return $this->code;  
  }

  <<__Rx>>
  public function __construct(?string $message = null, ?MyEnum $code = null  ) {
    parent::__construct();
    $this->message = $message ?? '';
      /* HH_FIXME[4110] nontransparent Enum */
    $this->code = $code ?? MyEnum::MyValue2;
  }

  <<__Rx>>
  public static function withDefaultValues(): this {
    return new static();
  }

  <<__Rx>>
  public static function fromShape(self::TConstructorShape $shape): this {
    return new static(
      Shapes::idx($shape, 'message'),
      Shapes::idx($shape, 'code'),
    );
  }

  public function getName(): string {
    return 'MyException4';
  }

  public static function getAllStructuredAnnotations(): \TStructAnnotations {
    return shape(
      'struct' => dict[],
      'fields' => dict[
      ],
    );
  }

}

/**
 * Original thrift exception:-
 * MyException5
 */
class MyException5 extends \TException implements \IThriftStruct {
  use \ThriftSerializationTrait;

  const dict<int, this::TFieldSpec> SPEC = dict[
    1 => shape(
      'var' => 'message',
      'type' => \TType::STRING,
    ),
    2 => shape(
      'var' => 'code',
      'type' => \TType::I64,
    ),
  ];
  const dict<string, int> FIELDMAP = dict[
    'message' => 1,
    'code' => 2,
  ];

  const type TConstructorShape = shape(
    ?'message' => ?string,
    ?'code' => ?int,
  );

  const int STRUCTURAL_ID = 7335721753390449361;
  /**
   * Original thrift field:-
   * 1: string message
   */
  public string $message;
  /**
   * Original thrift field:-
   * 2: i64 code
   */
  public int $code;

  <<__Rx>>
  public function __construct(?string $message = null, ?int $code = null  ) {
    parent::__construct();
    $this->message = $message ?? '';
    $this->code = $code ?? 0;
  }

  <<__Rx>>
  public static function withDefaultValues(): this {
    return new static();
  }

  <<__Rx>>
  public static function fromShape(self::TConstructorShape $shape): this {
    return new static(
      Shapes::idx($shape, 'message'),
      Shapes::idx($shape, 'code'),
    );
  }

  public function getName(): string {
    return 'MyException5';
  }

  public static function getAllStructuredAnnotations(): \TStructAnnotations {
    return shape(
      'struct' => dict[],
      'fields' => dict[
      ],
    );
  }

}

