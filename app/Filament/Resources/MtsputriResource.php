<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MtsputriResource\Pages;
use App\Filament\Resources\MtsputriResource\RelationManagers;
use App\Models\Mtsputri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MtsputriResource extends Resource
{
    protected static ?string $model = Mtsputri::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('tempat_lahir')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('tanggal_lahir'),
                Forms\Components\TextInput::make('nik')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('kk')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('nama_kk')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('nisn')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('nis')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('tk')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('paud')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('hobi')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('cita_cita')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('anak_ke')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('jumlah_saudara')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('tgl_masuk')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('kks')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('pkh')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('kip')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('jenjang_pendidikan_sebelumnya')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('status_sekolah_sebelumnya')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('nama_sekolah_sebelumnya')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('npsn_sekolah_sebelumnya')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('alamat_sekolah_sebelumnya')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('kecamatan_sekolah_sebelumnya')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('kabupaten_sekolah_sebelumnya')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('provinsi_sekolah_sebelumnya')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('nik_ayah')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('nama_ayah')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('tempat_lahir_ayah')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('tanggal_lahir_ayah'),
                Forms\Components\TextInput::make('status_ayah')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('no_hp_ayah')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('pendidikan_ayah')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('pekerjaan_ayah')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('penghasilan_ayah')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('nik_ibu')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('nama_ibu')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('tempat_lahir_ibu')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('tanggal_lahir_ibu'),
                Forms\Components\TextInput::make('status_ibu')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('no_hp_ibu')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('pendidikan_ibu')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('pekerjaan_ibu')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('penghasilan_ibu')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('status_milik')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('alamat_rumah_tinggal')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('rt')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('rw')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('desa')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('kecamatan')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('kabupaten')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('provinsi')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('kode_pos')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('nik_wali')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('nama_wali')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('tempat_lahir_wali')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('tanggal_lahir_wali'),
                Forms\Components\TextInput::make('no_hp_wali')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('pendidikan_wali')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('pekerjaan_wali')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('penghasilan_wali')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_kk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nisn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('paud')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hobi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cita_cita')
                    ->searchable(),
                Tables\Columns\TextColumn::make('anak_ke')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah_saudara')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tgl_masuk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kks')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pkh')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenjang_pendidikan_sebelumnya')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_sekolah_sebelumnya')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_sekolah_sebelumnya')
                    ->searchable(),
                Tables\Columns\TextColumn::make('npsn_sekolah_sebelumnya')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat_sekolah_sebelumnya')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kecamatan_sekolah_sebelumnya')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kabupaten_sekolah_sebelumnya')
                    ->searchable(),
                Tables\Columns\TextColumn::make('provinsi_sekolah_sebelumnya')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir_ayah')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_hp_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pendidikan_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pekerjaan_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('penghasilan_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir_ibu')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_hp_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pendidikan_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pekerjaan_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('penghasilan_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_milik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat_rumah_tinggal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rt')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rw')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kecamatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kabupaten')
                    ->searchable(),
                Tables\Columns\TextColumn::make('provinsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode_pos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik_wali')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_wali')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir_wali')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir_wali')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_hp_wali')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pendidikan_wali')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pekerjaan_wali')
                    ->searchable(),
                Tables\Columns\TextColumn::make('penghasilan_wali')
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
            'index' => Pages\ListMtsputris::route('/'),
            'create' => Pages\CreateMtsputri::route('/create'),
            'edit' => Pages\EditMtsputri::route('/{record}/edit'),
        ];
    }
}
