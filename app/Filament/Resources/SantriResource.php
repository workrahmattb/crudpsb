<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SantriResource\Pages;
use App\Filament\Resources\SantriResource\RelationManagers;
use App\Models\Santri;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Wizard;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SantriResource extends Resource
{
    protected static ?string $model = Santri::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make()
                    ->steps([
                        // Step 1: Personal Information
                        Forms\Components\Wizard\Step::make('Data Anak')
                            ->schema([
                                Section::make('Personal Information')
                                    ->schema([

                                        Forms\Components\TextInput::make('nama')
                                            //->required()
                                            ->label('Nama Anak')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('tempat_lahir')
                                            //->required()
                                            ->maxLength(255),
                                        Forms\Components\DatePicker::make('tanggal_lahir')
                                            //->required()
                                            ->displayFormat('d/m/Y')
                                            ->label('Tanggal Lahir'),
                                        Forms\Components\TextInput::make('nik')
                                            //->required()
                                            ->numeric()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('kk')
                                            ->label('Nomor Kartu Keluarga')
                                            //->required()
                                            ->numeric()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('nama_kk')
                                            //->required()
                                            ->label('Nama Kepala Keluarga')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('nisn')
                                            //->required()
                                            ->numeric()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('nis')
                                            ->numeric()
                                            ->maxLength(255),
                                        Forms\Components\Radio::make('tk')
                                            ->label('Pernah TK?')
                                            ->options([
                                                'ya' => 'Ya',
                                                'tidak' => 'Tidak',
                                            ]),
                                        Forms\Components\Radio::make('paud')
                                            ->label('Pernah PAUD?')
                                            ->options([
                                                'ya' => 'Ya',
                                                'tidak' => 'Tidak',
                                            ]),
                                        Forms\Components\TextInput::make('hobi')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('cita_cita')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('anak_ke')
                                            //->required()
                                            ->numeric()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('jumlah_saudara')
                                            //->required()
                                            ->numeric()
                                            ->maxLength(255),
                                    ])
                                    ->columns(2),

                                Section::make('Tanggal Masuk Pondok Pesantren Syafaaturrasul')
                                    ->schema([
                                        Forms\Components\DatePicker::make('tgl_masuk')
                                            ->displayFormat('d/m/Y'),
                                    ]),

                                Section::make('Bantuan Pemerintah')
                                    ->schema([
                                        Forms\Components\TextInput::make('kks')
                                            ->label('Nomor KKS')
                                            ->numeric(),
                                        Forms\Components\TextInput::make('pkh')
                                            ->label('Nomor PKH')
                                            ->numeric()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('kip')
                                            ->label('Nomor PKH')
                                            ->numeric()
                                            ->maxLength(255),
                                    ]),

                                Section::make('Data Sekolah Sebelumnya')
                                    ->schema([
                                        Forms\Components\Select::make('jenjang_pendidikan_sebelumnya')
                                            //->required()
                                            ->options([
                                                'sd' => 'SD',
                                                'mi' => 'MI',
                                                'smp' => 'SMP',
                                                'mts' => 'MTs',
                                                'sma' => 'SMA',
                                                'ma' => 'MA',
                                            ]),
                                        Forms\Components\Select::make('status_sekolah_sebelumnya')
                                            //->required()
                                            ->options([
                                                'negeri' => 'Negeri',
                                                'swasta' => 'Swasta',
                                            ]),
                                        Forms\Components\TextInput::make('nama_sekolah_sebelumnya')
                                            //->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('npsn_sekolah_sebelumnya')
                                            //->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('alamat_sekolah_sebelumnya')
                                            //->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('kecamatan_sekolah_sebelumnya')
                                            //->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('kabupaten_sekolah_sebelumnya')
                                            //->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('provinsi_sekolah_sebelumnya')
                                            //->required()
                                            ->maxLength(255),
                                    ])
                                    ->columns(2)

                            ]),




                        // Step 2: Family Information
                        Forms\Components\Wizard\Step::make('Data Orang Tua')
                            ->schema([
                                Section::make('Data Ayah')
                                    ->schema([
                                        Forms\Components\TextInput::make('nik_ayah')
                                            //->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('nama_ayah')
                                            //->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('tempat_lahir_ayah')
                                            //->required()
                                            ->maxLength(255),
                                        Forms\Components\DatePicker::make('tanggal_lahir_ayah')
                                            //->required()
                                            ->displayFormat('d/m/Y'),
                                        Forms\Components\Select::make('status_ayah')
                                            //->required()
                                            ->options([
                                                'hidup' => 'Hidup',
                                                'meninggal' => 'Meninggal',
                                            ])
                                            ->default('hidup'),
                                        Forms\Components\TextInput::make('no_hp_ayah')
                                            //->required()
                                            ->maxLength(15),
                                        Forms\Components\Select::make('pendidikan_ayah')
                                            //->required()
                                            ->options([
                                                'SD' => 'SD',
                                                'SMP' => 'SMP',
                                                'SMA' => 'SMA',
                                                'D1' => 'Diploma 1 (D1)',
                                                'D2' => 'Diploma 2 (D2)',
                                                'D3' => 'Diploma 3 (D3)',
                                                'S1' => 'Sarjana (S1)',
                                                'S2' => 'Magister (S2)',
                                                'S3' => 'Doktoral (S3)',
                                            ]),
                                        Forms\Components\Select::make('pekerjaan_ayah')
                                            //->required()
                                            ->options([
                                                'Tidak Bekerja' => 'Tidak Bekerja',
                                                'Petani' => 'Petani',
                                                'Nelayan' => 'Nelayan',
                                                'Buruh' => 'Buruh',
                                                'Pegawai Swasta' => 'Pegawai Swasta',
                                                'PNS' => 'Pegawai Negeri Sipil (PNS)',
                                                'TNI/Polri' => 'TNI/Polri',
                                                'Wiraswasta' => 'Wiraswasta',
                                                'Pedagang' => 'Pedagang',
                                                'Guru/Dosen' => 'Guru/Dosen',
                                                'Dokter' => 'Dokter',
                                                'Pengacara' => 'Pengacara',
                                                'Notaris' => 'Notaris',
                                                'Seniman' => 'Seniman',
                                                'Penulis' => 'Penulis',
                                                'Pensiunan' => 'Pensiunan',
                                                'Lainnya' => 'Lainnya',
                                            ]),
                                        Forms\Components\Select::make('penghasilan_ayah')
                                            ->label('Penghasilan Ayah / Bulan')
                                            //->required()
                                            ->options([
                                                '0-1 juta' => '0 - 1 Juta',
                                                '1-3 juta' => '1 - 3 Juta',
                                                '3-5 juta' => '3 - 5 Juta',
                                                '5-10 juta' => '5 - 10 Juta',
                                                '10-20 juta' => '10 - 20 Juta',
                                                '20-50 juta' => '20 - 50 Juta',
                                                '50 juta lebih' => '50 Juta Lebih',
                                                'Tidak Tahu' => 'Tidak Tahu',
                                            ])


                                    ])
                                    ->columns(2),

                                Section::make('Data Ibu')
                                    ->schema([

                                        Forms\Components\TextInput::make('nik_ibu')
                                            //->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('nama_ibu')
                                            //->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('tempat_lahir_ibu')
                                            //->required()
                                            ->maxLength(255),
                                        Forms\Components\DatePicker::make('tanggal_lahir_ibu')
                                            //->required()
                                            ->displayFormat('d/m/Y'),
                                        Forms\Components\Select::make('status_ibu')
                                            //->required()
                                            ->options([
                                                'hidup' => 'Hidup',
                                                'meninggal' => 'Meninggal',
                                            ])
                                            ->default('hidup'),
                                        Forms\Components\TextInput::make('no_hp_ibu')
                                            //->required()
                                            ->maxLength(15),
                                        Forms\Components\Select::make('pendidikan_ibu')
                                            //->required()
                                            ->options([
                                                'SD' => 'SD',
                                                'SMP' => 'SMP',
                                                'SMA' => 'SMA',
                                                'D1' => 'Diploma 1 (D1)',
                                                'D2' => 'Diploma 2 (D2)',
                                                'D3' => 'Diploma 3 (D3)',
                                                'S1' => 'Sarjana (S1)',
                                                'S2' => 'Magister (S2)',
                                                'S3' => 'Doktoral (S3)',
                                            ]),
                                        Forms\Components\Select::make('pekerjaan_ibu')
                                            //->required()
                                            ->options([
                                                'Irt' => 'Ibu Rumah Tangga (IRT)',
                                                'Tidak Bekerja' => 'Tidak Bekerja',
                                                'Petani' => 'Petani',
                                                'Nelayan' => 'Nelayan',
                                                'Buruh' => 'Buruh',
                                                'Pegawai Swasta' => 'Pegawai Swasta',
                                                'PNS' => 'Pegawai Negeri Sipil (PNS)',
                                                'TNI/Polri' => 'TNI/Polri',
                                                'Wiraswasta' => 'Wiraswasta',
                                                'Pedagang' => 'Pedagang',
                                                'Guru/Dosen' => 'Guru/Dosen',
                                                'Dokter' => 'Dokter',
                                                'Pengacara' => 'Pengacara',
                                                'Notaris' => 'Notaris',
                                                'Seniman' => 'Seniman',
                                                'Penulis' => 'Penulis',
                                                'Pensiunan' => 'Pensiunan',
                                                'Lainnya' => 'Lainnya',
                                            ]),
                                        Forms\Components\Select::make('penghasilan_ibu')
                                            ->label('Penghasilan Ibu / Bulan')
                                            //->required()
                                            ->options([
                                                '0-1 juta' => '0 - 1 Juta',
                                                '1-3 juta' => '1 - 3 Juta',
                                                '3-5 juta' => '3 - 5 Juta',
                                                '5-10 juta' => '5 - 10 Juta',
                                                '10-20 juta' => '10 - 20 Juta',
                                                '20-50 juta' => '20 - 50 Juta',
                                                '50 juta lebih' => '50 Juta Lebih',
                                                'Tidak Tahu' => 'Tidak Tahu',
                                            ])
                                        // Add other family fields as needed
                                    ])
                                    ->columns(2),
                            ]),


                        // Step 3: Address Information
                        Forms\Components\Wizard\Step::make('Tempat Tinggal')
                            ->schema([
                                Forms\Components\Select::make('status_milik')
                                    //->required()
                                    ->options([
                                        'Milik Sendiri' => 'Milik Sendiri',
                                        'Sewa' => 'Sewa',
                                        'Kontrak' => 'Kontrak',
                                        'Dinas' => 'Dinas',
                                        'Hibah' => 'Hibah',
                                        'Pinjaman' => 'Pinjaman',
                                        'Lainnya' => 'Lainnya',
                                    ])
                                    ->label('Status Kepemilikan Rumah'),
                                Forms\Components\TextInput::make('alamat_rumah_tinggal')
                                    //->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('rt')
                                    ->numeric()
                                    ->maxLength(10),
                                Forms\Components\TextInput::make('rw')
                                    ->numeric()
                                    ->maxLength(10),
                                Forms\Components\TextInput::make('desa')
                                    //->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('kecamatan')
                                    //->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('kabupaten')
                                    //->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('provinsi')
                                    //->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('kode_pos')
                                    //->required()
                                    ->maxLength(10),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpan(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Lengkap')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('desa')
                    ->label('Alamat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSantris::route('/'),
            'create' => Pages\CreateSantri::route('/create'),
            'edit' => Pages\EditSantri::route('/{record}/edit'),
        ];
    }
}
